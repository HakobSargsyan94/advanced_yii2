<?php

namespace app\controllers;

use app\models\Frontend;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;

class FrontendController extends Controller
{
    const REQUEST_GET = 'get';

    public function beforeAction($action)
    {
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }

    public function actionInsert () {
        $checkRequestIsPost = \Yii::$app->request->isPost;
        $token = $_SERVER['HTTP_TOKEN'] ?? '';
        $isValidToken = Frontend::checkIsValidToken($token) ;

        if ($isValidToken) {

            if ($checkRequestIsPost) {
                $entityBody = file_get_contents('php://input');
                Frontend::insertJson($entityBody, $token);
            }

            $checkRequestIsGet = \Yii::$app->request->isGet;
            if ($checkRequestIsGet) {
                $getData = $_GET;
                Frontend::insertJson($getData, $token, self::REQUEST_GET);
            }

        } else {
            die(json_encode(['status' => 400, 'message' => "Invalid token or token is expired"]));
        }
    }
}

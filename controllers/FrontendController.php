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
        $token = $_SERVER['HTTP_TOKEN'];
        if ($checkRequestIsPost) {
            $entityBody = file_get_contents('php://input');
            Frontend::insertJson($entityBody, $token);
        }

        $checkRequestIsGet = \Yii::$app->request->isGet;
        if ($checkRequestIsGet) {
            $getData = $_GET;
            Frontend::insertJson($getData, $token, self::REQUEST_GET);
        }

    }
}

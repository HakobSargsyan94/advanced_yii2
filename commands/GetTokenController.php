<?php

namespace app\commands;

use app\components\Helpers;
use app\models\Auth;
use app\models\LoginForm;
use app\models\User;
use Yii;
use yii\console\Controller;


class GetTokenController extends Controller
{

    public function actionIndex()
    {
        $username = readline('Enter a username : ');
        $password = readline('Enter a password : ');

        $res = Helpers::checkUser($username, $password);

        if ($res) {
            $generatedToken = Helpers::generateToken();

            $tokenAdd = new Auth();
            $tokenAdd->token = $generatedToken;
            $tokenAdd->expiration_date = date('Y-m-d H:i:s');
            $tokenAdd->save(false);

            die($generatedToken);
        } else {
            die('Username or/and password is invalid!');
        }
    }
}

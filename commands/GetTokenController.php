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

        $res = $this->checkUser($username, $password);

        if ($res) {
            $token = new Auth();
            $token->token = Helpers::generateToken();
            $token->expiration_date = date('Y-m-d H:i:s', strtotime('+5 minutes'));
            $token->save(false);
        }
    }

    /**
     * @param string $username
     * @param string $password
     * @return bool
     */
    private function checkUser (string $username, string $password): bool
    {
        $res = User::find()
            ->where(['username' => $username])
            ->andWhere(['password_hash' => \Yii::$app->security->decryptByPassword('',$password)])
            ->exists();

        if ($res) {
            return true;
        }

        return false;
    }
}

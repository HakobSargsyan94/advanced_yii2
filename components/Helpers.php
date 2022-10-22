<?php

namespace app\components;

use app\models\User;

class Helpers
{
    /**
     * @return string
     * @throws \Exception
     */
    public static function generateToken (): string
    {
        return bin2hex(random_bytes(16));
    }

    /**
     * @param string $username
     * @param string $password
     * @return bool
     */
    public static function checkUser (string $username, string $password): bool
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
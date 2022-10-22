<?php

namespace app\models;


class Frontend
{
    /**
     * @param string $data
     * @param string $token
     * @return false|void
     */
    public static function insertJson (string $data, string $token, string $request = 'post'): void
    {
        $checkIsValidToken = self::checkIsValidToken($token);
        if ($checkIsValidToken) {
            $current_mem = memory_get_usage();
            $startTime = strtotime(date('Y-m-d H:i:s'));
            $db_data = new Data();

            if ($request == 'post') {
                $db_data->data = $data;
            } else {
                $db_data->data = json_encode($data);
            }

            if ($db_data->save(false)) {
                $returnedData = [];
                $returnedData['id'] = $db_data->id;
                $returnedData['memory'] = memory_get_usage() - $current_mem;
                $returnedData['spent_time'] = strtotime(date('Y-m-d H:i:s')) -  $startTime;

                $updateData = Data::find()->where(['id' => $returnedData['id']])->one();
                $updateData->spend_time = $returnedData['spent_time'];
                $updateData->memory = $returnedData['memory'];
                $updateData->save(false);

                die(json_encode($returnedData));
            } else {
                die(json_encode(['status' => 400, 'message' => "Data don`t save!"]));
            }
        }
    }

    /**
     * @param string $token
     * @return bool
     */
    private static function checkIsValidToken (string $token): bool
    {
        $checkAuthIsValid = Auth::find()->where(['token' => $token])->one();
        if ($checkAuthIsValid) {
            $diff = strtotime(date('Y-m-d H:i:s')) - strtotime($checkAuthIsValid['expiration_date']);
            $time = ltrim(date('i', $diff), 0);
            if ($time <= 5) {
                return true;
            }

            return false;
        }

        return false;
    }

}
<?php

namespace app\components;

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

}
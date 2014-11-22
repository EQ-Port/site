<?php

class TextHelper
{
    /**
     * Возвращает строку случайных символов
     *
     * @param int $length длина строки
     *
     * @return string
     */
    public static function getRandomString($length = 8)
    {
        $chars   = '1234567890qwertyuiopasdfghjklzxcvbnm!@#$^*=+QWERTYUIOPASDFGHJKLZXCVBNM';
        $maxRand = strlen($chars) - 1;

        $result = '';
        for ($i = 0; $i < $length; $i++) {
            $result .= $chars[mt_rand(0, $maxRand)];
        }

        return $result;
    }

    public static function generateHash($password)
    {
        $salt = self::getRandomString(8);
        return $salt . md5($password . $salt);
    }
}
<?php

namespace App\Helpers;

use App\length;

class StringHelper
{
    /**
     * this function will generate a random string
     * @param $length length of the string
     * @return string
     */
    public static function generateRandomString($length): string
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
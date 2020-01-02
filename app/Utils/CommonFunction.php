<?php

namespace App\Utils;

class CommonFunction
{
    public static function flash($message, $level = 'info')
    {
        session()->flash('flash_message', $message);
        session()->flash('flash_message_level', $level);
    }

    public static function getUserType($usertype)
    {
        if ($usertype == 0) {
            return 'User';
        } elseif ($usertype == 1) {
            return 'Moderator';
        } elseif ($usertype == 2) {
            return 'Super Admin';
        }
    }

    public static function getStatus($status)
    {
        if ($status == 0) {
            return 'Inactive';
        } elseif ($status == 1) {
            return 'Active';
        }
    }

    public static function generateRandomString($length = 10)
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

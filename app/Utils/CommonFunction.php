<?php

namespace App\Utils;

class CommonFunction
{
    public static function flash($message, $level = 'info'){
        session()->flash('flash_message', $message);
        session()->flash('flash_message_level', $level);
    }
}

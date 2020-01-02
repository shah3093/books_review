<?php

namespace App\Traits;

use App\Mail\SendEmail;
use Illuminate\Support\Facades\Mail;

trait SendEmailTrait
{

    public function sendEmail($data, $to, $email_subject, $template, $from = null, $attachment = null)
    {
        try {
            $from = config('mail.from.address');
            Mail::to($to)->send(new SendEmail($data, $email_subject, $from, $attachment, $template));
        } catch (\Exception $e) {
            dd($e);
        }
    }

}

<?php

namespace App\Services;

use Illuminate\Support\Facades\Mail;

class EmailServices
{
    private function sendEmail ( $from, $to, $subject, $view, $data, $emailFrom){
       Mail::send($view, $data, function ($message) use ($from, $to, $subject, $emailFrom)
       {
        $message->from($emailFrom);
        $message->to($to);
        $message->to($subject);
       });
      
    }
    public function recoverPWD($user, $email, $password)
    {
        $subject = "Video - Nueva contraseña";
        $view = 'emails.recoverypassword';
        $data = [
            'data' => [
                'title' => 'Video - Nueva contraseña',
                'name' => $user->name,
                'email' => $email,
                'password' => $password,
            ]
            ];
            
            $this->sendEmail(env('EMAIL_FROM'), $email, $subject, $view, $data, env('EMAIL_FROM'));
    }
}
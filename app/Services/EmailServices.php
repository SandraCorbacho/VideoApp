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
        $message->subject($subject);
       
       });
      
    }
    public function contact($name, $email, $message)
    {
        
        $subject = "Video - Contacto";
        $view = 'emails.contacto';
        $to = $email;
        $data = [
            'data' => [
                'title' => 'Video - Contacto',
                'name' => $name,
                'email' => $email,
                'message' => $message,
            ]
            ];
           
            $this->sendEmail(env('EMAIL_FROM'),$to, $subject, $view, $data, env('EMAIL_FROM'));
    }
}
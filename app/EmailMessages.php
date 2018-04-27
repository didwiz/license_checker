<?php

namespace App;

use Illuminate\Support\Facades\Mail;
use Modules\License\Repositories\License\LicenseRepositoryInterface;
use Snowfire\Beautymail\Beautymail;


class EmailMessages
{
    /** Refactor current email implementation into this class and use beautymail instead */
    const  EXPIRY_NOTICE = 'License Expiry Daily Notice';

    public static function sendExpiryNotice($licenses,$recipient){
        try {
            $params['title'] = "Your Licenses are about to expire!";
            $params['to'] = $recipient;
            return self::send('emails.expiry_notice',self::EXPIRY_NOTICE, $licenses, $params);
        } catch (\Exception $ex) {
            return $ex->getMessage();
        }
    }

    public static function send($template, $subject, $data, $params = []){

        Mail::send($template, ['title' => $params['title'], 'data' => $data], function ($message) use ($subject,$params) {

            $message->from('LicenseTracker@gmail.com', 'License Tracker');
            $message->to($params['to']);
            $message->subject($subject);

        });
    }
}
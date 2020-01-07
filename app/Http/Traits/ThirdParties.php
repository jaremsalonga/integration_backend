<?php


namespace App\Traits;


use Nexmo\Laravel\Facade\Nexmo;
use Utils\Twilio;


trait ThirdPartyTrait
{

    public function sendSMS(array $config = NULL)
    {

        ['mobileNo' => $mobileNo, 'message' => $message] = $config;

        Nexmo::message()->send([
            'to'   => $mobileNo ?: '639354244394',
            'from' => 'Nexmo',
            'text' => $message ?: 'Using the facade to send a message.'
        ]);
    }

    public function sendWhatsApp(array $config = NULL)
    {
        $whatsApp = new Twilio;

        $whatsApp->sendWhatsAppSMS();
    }
}

<?php

namespace Utils;

class Twilio
{

    private $sid = "ACb63dd337e5c4c5010d41c3d8a73e3e77"; // Your Account SID from www.twilio.com/console
    private $token = "6c6c27c44bb47a98710102899db71e59"; // Your Auth Token from www.twilio.com/console

    private $client;

    public function __construct()
    {
        $this->client = new \Twilio\Rest\Client($this->sid, $this->token);
    }

    public function sendSMS($from, $body, $to)
    {
        $message = $this->client->messages->create(
            $to, // Text this number
            array(
                'from' => $from, // From a valid Twilio number
                'body' => $body
            )
        );
        return $message->sid;
    }


    public function sendWhatsAppSMS($from = '+14155238886', $to = '+639354244394', $body = 'Your Yummy Cupcakes Company order of 1 dozen frosted cupcakes has shipped and should be delivered on July 10, 2019. Details: http://www.yummycupcakes.com/')
    {

        $twilio = new \Twilio\Rest\Client($this->sid, $this->token);
        $twilio->messages
            ->create(
                "whatsapp:" . $to, // to
                array(
                    "from" => "whatsapp:" . $from,
                    "body" => $body
                )
            );
    }
}

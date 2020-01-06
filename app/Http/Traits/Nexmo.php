<?php

namespace App\Traits;

use Nexmo\Laravel\Facade\Nexmo;

trait NexmoTrait {

    public function send(array $config = NULL) {

        ['mobileNo' => $mobileNo ,'message' => $message] = $config;

        Nexmo::message()->send([
            'to'   => $mobileNo ?: '639354244394',
            'from' => 'Nexmo',
            'text' => $message ?: 'Using the facade to send a message.'
        ]);
    }

}

?>

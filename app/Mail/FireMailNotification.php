<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FireMailNotification extends Mailable
{
    use Queueable, SerializesModels;
    public $mymessage;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($get_message)
    {
        $this->mymessage = $get_message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $address = 'test2022@umbrella.sa';
        $name = 'UMBRELLA | BU';
        $subject = 'NEW MAIL FROM UMBRELLA  !';
        return $this->view('_partials._mail')
            ->from($address, $name)
            ->subject($subject)
          ;
    }
}

<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Modules\License\Entities\License;

class Notification extends Mailable
{
    use Queueable, SerializesModels;

    public $licenses = array();

    /**
     * Notification constructor.
     * @param $licenses
     */
    public function __construct($licenses)
    {
        $this->licenses = $licenses;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.report')->subject("Requested Report From License Tracker");
    }
}

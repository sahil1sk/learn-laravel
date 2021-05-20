<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MarkMail extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = "Changing Subject"; 

    public $details;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.sample-markdown');
        // another way to send mail
        // return $this->subject("Test Mail From Laravel")->markdown('emails.sample-markdown');
    }
}

<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class ContactMessage extends Mailable
{
    public $messageData;

    public function __construct($messageData)
    {
        $this->messageData = $messageData;
    }

    public function build()
    {
        return $this->subject('New Contact Message')
                    ->view('emails.contact')
                    ->with('data', $this->messageData);
    }
}

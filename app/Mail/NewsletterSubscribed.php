<?php

// app/Mail/NewsletterSubscribed.php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewsletterSubscribed extends Mailable
{
    use Queueable, SerializesModels;

    public $email;

    public function __construct($email)
    {
        $this->email = $email;
    }

    public function build()
    {
        return $this->subject('Thanks for Subscribing!')
                    ->view('emails.newsletter-subscribed')
                    ->with(['email' => $this->email]);
    }
}


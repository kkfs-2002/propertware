<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User; // <-- Use User model

class VendorSelectedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $vendor;

    public function __construct(User $vendor) // <-- Accept User
    {
        $this->vendor = $vendor;
    }

    public function build()
    {
        return $this->subject('You have been selected!')
            ->view('emails.vendor-selected');
    }
}
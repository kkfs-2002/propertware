<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ServiceRequestApprovalMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $serviceRequest;

    public function __construct($user, $serviceRequest)
    {
        $this->user = $user;
        $this->serviceRequest = $serviceRequest;
    }

    public function build()
    {
        return $this->markdown('emails.service_request_approved')
                    ->subject(config('app.name') . ' Service Request Approved');
    }
}
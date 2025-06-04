<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ServiceRequestRejectionMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $serviceRequest;
    public $reason;

    /**
     * Create a new message instance.
     *
     * @param $user
     * @param $serviceRequest
     * @param $reason
     */
    public function __construct($user, $serviceRequest, $reason = null)
    {
        $this->user = $user;
        $this->serviceRequest = $serviceRequest;
        $this->reason = $reason;
    }

    public function build()
    {
        return $this->markdown('emails.service_request_rejected')
                    ->subject(config('app.name') . ' Service Request Reviewed');
    }
}
<?php

namespace App\Mail;

use App\Models\EmailTemplate;
use App\Models\Setting;
use App\Models\Ticket;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AcceptJob extends Mailable
{
    use Queueable, SerializesModels;

    public $subject, $job;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subject, $job,)
    {
        $this->subject = $subject;
        $this->job = $job;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $settings = Setting::first();

        $mail = $this->view('email.AcceptedJob', [
            'subject' => $this->subject,
            'job' => $this->job,
            'settings' => $settings,
        ])->subject($this->subject);
        return $mail;

    }
}

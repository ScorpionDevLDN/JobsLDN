<?php

namespace App\Mail;

use App\Models\EmailTemplate;
use App\Models\Setting;
use App\Models\Ticket;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RetractFromJob extends Mailable
{
    use Queueable, SerializesModels;

    public $subject, $job, $job_seeker, $attachment;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subject, $job, $job_seeker, $attachment = null)
    {
        $this->subject = $subject;
        $this->job = $job;
        $this->job_seeker = $job_seeker;
        $this->attachment = $attachment;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $settings = Setting::first();

        $mail = $this->view('email.RetractFromJob', [
            'subject' => $this->subject,
            'job' => $this->job,
            'job_seeker' => $this->job_seeker,
            'attachment' => $this->attachment,
            'settings' => $settings,
        ])->subject($this->subject);


        return $mail;

    }
}

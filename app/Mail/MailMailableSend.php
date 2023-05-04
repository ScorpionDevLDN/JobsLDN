<?php

namespace App\Mail;

use App\Models\EmailTemplate;
use App\Models\Setting;
use App\Models\Ticket;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailMailableSend extends Mailable
{
    use Queueable, SerializesModels;

    public $subject, $msg, $attachment;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subject, $msg, $attachment = null)
    {
        $this->subject = $subject;
        $this->msg = $msg;
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

        if ($this->attachment) {
            $mail = $this->view('email.template', [
                'subject' => $this->subject,
                'msg' => $this->msg,
                'settings' => $settings,
            ])->subject($this->subject);
        } else {
            $mail = $this->view('email.template', [
                'subject' => $this->subject,
                'msg' => $this->msg,
                'settings' => $settings,
            ])->subject($this->subject)
                ->attach(@$this->attachment["path"], [@$this->attachment["as"],
                    'mime' => 'application/pdf'
                ]);
        }

        return $mail;

    }
}

<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ApplyMeetMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.invite')
        ->from('career-advisor@sociarise.co.jp', 'Global Talent Library事務局')
        ->subject('企業より面会のお誘いがありました！')
        ->bcc('career-advisor@sociarise.co.jp')
        ->with(['name' => $this->name]);
        
    }
}

<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactUsAdmin extends Mailable
{
    use Queueable, SerializesModels;

    protected $name;
    protected $email;
    protected $msg;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(String $name, String $email, String $msg)
    {
        $this->name = $name;
        $this->email = $email;
        $this->msg = $msg;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.contactUsAdmin')
            ->with([
                'name' => $this->name,
                'email' => $this->email,
                'msg' => $this->msg
            ]);
    }
}

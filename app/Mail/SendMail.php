<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    public $sentData;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($sentData)
    {
        //
        $this->sentData = $sentData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('truongngo.050902@gmail.com', 'From Hai Truong')->subject('yêu cầu cấp lại mật khẩu từ shop bánh')->replyTo('truongngo.050902@gmail.com', 'Hai Truong')->view('emails.interFaceEmail',['sentData' => $this->sentData]);
        //return $this->view('view.name');
    }
}

<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMailOrder extends Mailable
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
        return $this->from('truongngo.050902@gmail.com', 'From Hai Truong')->subject('Đơn hàng của bạn đã đặt thành công')->replyTo('truongngo.050902@gmail.com', 'Hai Truong')->view('emails.interfaceEmailOrder',['sentData' => $this->sentData]);
    }
}

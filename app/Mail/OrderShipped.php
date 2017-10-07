<?php

namespace App\Mail;

use App\Order;
use Illuminate\Foundation\Auth\User;


use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderShipped extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $order;
    protected $userInfo;
    public function __construct(Order $order)
    {
        $this->order = $order;
        $this->userInfo = $order->user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->view('emails.email-shipped')->with(['order'=>$this->order,'userInfo'=>$this->userInfo]);
    }
}

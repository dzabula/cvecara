<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InvoiceMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name,$id,$sum)
    {
        $this->data['first_name'] = $name;
        $this->data['id'] = $id;
        $this->data['sum'] = $sum;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->from("markodasic70@gmail.com")->view('email.invoice',["data"  => $this->data]);
    }
}

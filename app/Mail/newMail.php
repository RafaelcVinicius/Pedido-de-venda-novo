<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class newMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->subject('novo ep');
        $this->to('dev.rafaelvinicius@gmail.com', 'rafael');
        return $this->markdown('mail.newMail');


        // return $this->from('to@email.com')
        //         ->view('emails.test')
        //         ->attach(storage_path('app/image.jpg'))
    }
}

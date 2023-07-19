<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class BookingMailer extends Mailable
{
    use Queueable, SerializesModels;
    public $name;
    public $dr_name;
    public $time;

    /**
     * Create a new message instance.
     *@param string $name
     * @param string $dr_name
     * @param string $time
     * @return void
     */
    public function __construct($name,$dr_name, $time)
    {
        $this->name = $name;
        $this->dr_name = $dr_name;
        $this->time = $time;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Booking Mailer')
            ->view('emails.booking')
            ->with([
                'name' => $this->name,
                'dr_name' => $this->dr_name,
                'time' => $this->time,
            ]);
    }



}

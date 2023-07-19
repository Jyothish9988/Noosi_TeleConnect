<?php

namespace App\Mail;

use App\Models\Patients;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegistrationConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $patient;
    public $regId;

    /**
     * Create a new message instance.
     *
     * @param  Patients  $patient
     * @param  string  $regId
     * @return void
     */
    public function __construct(Patients $patient, $regId)
    {
        $this->patient = $patient;
        $this->regId = $regId;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Registration Confirmation')
            ->view('emails.registration_confirmation')
            ->with([
                'patient' => $this->patient,
                'regId' => $this->regId,
            ]);
    }
}

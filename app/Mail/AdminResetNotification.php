<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class AdminResetNotification extends Mailable
{
    public $userEmail;
    public $token;

    public function __construct($userEmail, $token)
    {
        $this->userEmail = $userEmail;
        $this->token = $token;
    }

    public function build()
    {
        $url = url(route('password.reset', [
            'token' => $this->token,
            'email' => $this->userEmail,
        ], false));

        return $this->subject('Alerta: Solicitud de reseteo de contraseña')
            ->view('emails.admin_reset')
            ->with([
                'userEmail' => $this->userEmail,
                'url' => $url,
            ]);
    }
} 
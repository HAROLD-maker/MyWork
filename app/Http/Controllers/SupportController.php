<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class SupportController extends Controller
{
    public function index()
    {
        return view('support');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:2000',
        ], [
            'name.required' => 'El nombre es obligatorio.',
            'name.max' => 'El nombre no puede tener más de 255 caracteres.',
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'El formato del correo electrónico no es válido.',
            'email.max' => 'El correo electrónico no puede tener más de 255 caracteres.',
            'subject.required' => 'El asunto es obligatorio.',
            'subject.max' => 'El asunto no puede tener más de 255 caracteres.',
            'message.required' => 'El mensaje es obligatorio.',
            'message.max' => 'El mensaje no puede tener más de 2000 caracteres.',
        ]);

        // Datos del ticket de soporte
        $supportData = [
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
            'user_id' => Auth::id(),
            'created_at' => now(),
        ];

        // Enviar email al administrador
        try {
            Mail::raw("
Nuevo ticket de soporte recibido:

Nombre: {$supportData['name']}
Email: {$supportData['email']}
Asunto: {$supportData['subject']}
Usuario ID: {$supportData['user_id']}
Fecha: {$supportData['created_at']}

Mensaje:
{$supportData['message']}

---
MyWork Support System
            ", function($message) use ($supportData) {
                $message->to('haroldmontoya523@gmail.com')
                        ->subject("Ticket de Soporte: {$supportData['subject']}")
                        ->replyTo($supportData['email'], $supportData['name']);
            });

            // Enviar confirmación al usuario
            Mail::raw("
Hola {$supportData['name']},

Hemos recibido tu mensaje de soporte con el asunto: {$supportData['subject']}

Nuestro equipo revisará tu consulta y te responderemos lo antes posible.

Gracias por contactarnos.

Saludos,
El equipo de MyWork
            ", function($message) use ($supportData) {
                $message->to($supportData['email'])
                        ->subject("Confirmación de ticket de soporte: {$supportData['subject']}");
            });

            return redirect()->route('support.index')->with('status', '¡Mensaje enviado correctamente! Te responderemos pronto.');

        } catch (\Exception $e) {
            return back()->withErrors(['message' => 'Error al enviar el mensaje. Por favor, intenta nuevamente.']);
        }
    }
} 
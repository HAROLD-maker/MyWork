<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        return view('auth.profile', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore($user->id),
            ],
            'category' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
        ], [
            'name.required' => 'El nombre es obligatorio.',
            'name.max' => 'El nombre no puede tener más de 255 caracteres.',
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'El formato del correo electrónico no es válido.',
            'email.unique' => 'Este correo electrónico ya está registrado.',
            'category.max' => 'La categoría no puede tener más de 255 caracteres.',
            'location.max' => 'La ubicación no puede tener más de 255 caracteres.',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'category' => $request->category,
            'location' => $request->location,
        ]);

        return redirect()->route('profile.edit')->with('status', '¡Perfil actualizado correctamente!');
    }
} 
<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\CertificateController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/browse', function () {
    return 'Browse page (pendiente de implementar)';
});

Route::get('/categorias', function () {
    return view('categories');
});

Route::get('/nosotros', function () {
    return view('nosotros');
});

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', function (Request $request) {
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ], [
        'email.required' => 'El correo electrónico es obligatorio.',
        'email.email' => 'El formato del correo electrónico no es válido.',
        'password.required' => 'La contraseña es obligatoria.',
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        
        // Verificar que el usuario esté autenticado
        if (Auth::check()) {
            return redirect()->route('dashboard')->with('status', '¡Bienvenido de vuelta!');
        }
    }

    return back()->withErrors([
        'email' => 'El correo electrónico o la contraseña son incorrectos.',
    ])->withInput($request->only('email'));
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::post('/register', function (Request $request) {
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
    ]);

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    return redirect()->route('login')->with('status', '¡Registro exitoso! Ahora puedes iniciar sesión.');
});

Route::post('/logout', function () {
    Auth::logout();
    return redirect()->route('login');
})->name('logout');

Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

Route::get('/dashboard', function () {
    if (!Auth::check()) {
        return redirect()->route('login')->withErrors(['email' => 'Debes iniciar sesión para acceder al dashboard.']);
    }
    
    $user = Auth::user();
    $resumes = $user->resumes()->latest()->get();
    return view('dashboard', compact('user', 'resumes'));
})->middleware('auth')->name('dashboard');

// Ruta de prueba para verificar autenticación
Route::get('/test-auth', function () {
    if (Auth::check()) {
        return response()->json([
            'authenticated' => true,
            'user' => Auth::user()->name,
            'email' => Auth::user()->email
        ]);
    } else {
        return response()->json(['authenticated' => false]);
    }
});

Route::middleware('auth')->group(function () {
    // Rutas de perfil
    Route::get('/profile', [\App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
    
    // Rutas de soporte
    Route::get('/support', [\App\Http\Controllers\SupportController::class, 'index'])->name('support.index');
    Route::post('/support', [\App\Http\Controllers\SupportController::class, 'store'])->name('support.store');
    
    // Rutas de hojas de vida
    Route::post('/resumes', [\App\Http\Controllers\ResumeController::class, 'store'])->name('resumes.store');
    Route::delete('/resumes/{resume}', [\App\Http\Controllers\ResumeController::class, 'destroy'])->name('resumes.destroy');
});

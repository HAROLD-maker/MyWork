<?php

namespace App\Http\Controllers;

use App\Models\Resume;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CertificateController extends Controller
{
    public function index()
    {
        $resumes = Auth::user()->resumes()->latest()->get();
        return view('dashboard', compact('resumes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'version' => 'nullable|string|max:100',
            'file' => 'required|file|mimes:pdf,doc,docx|max:5120',
            'issued_at' => 'nullable|date',
        ]);

        $path = $request->file('file')->store('resumes');

        Resume::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'description' => $request->description,
            'version' => $request->version,
            'file_path' => $path,
            'issued_at' => $request->issued_at,
        ]);

        return redirect()->route('dashboard')->with('status', 'Hoja de vida subida correctamente.');
    }

    public function destroy(Resume $resume)
    {
        if ($resume->user_id !== Auth::id()) {
            abort(403);
        }

        // Eliminar archivo del storage
        if (file_exists(storage_path('app/public/' . $resume->file_path))) {
            unlink(storage_path('app/public/' . $resume->file_path));
        }

        $resume->delete();

        return redirect()->route('dashboard')->with('status', 'Hoja de vida eliminada correctamente.');
    }
}

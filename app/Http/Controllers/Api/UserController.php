<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::query()
            ->when($request->filled('search'), fn($q) => $q->where('name', 'like', '%'.$request->search.'%'))
            ->when($request->filled('category'), fn($q) => $q->where('category', $request->category))
            ->when($request->filled('location'), fn($q) => $q->where('location', $request->location))
            ->paginate(12);
        return JsonResource::collection($users);
    }

    public function show(User $user)
    {
        return new JsonResource($user);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'category' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
        ]);
        $data['password'] = bcrypt($data['password']);
        $user = User::create($data);
        return new JsonResource($user);
    }

    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name' => 'sometimes|string|max:255',
            'email' => ['sometimes','email',Rule::unique('users')->ignore($user->id)],
            'password' => 'nullable|string|min:6',
            'category' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
        ]);
        if(isset($data['password'])) $data['password'] = bcrypt($data['password']);
        $user->update($data);
        return new JsonResource($user);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return response()->json(['message' => 'Usuario eliminado']);
    }

    public function search(Request $request)
    {
        $users = User::query()
            ->when($request->filled('q'), fn($q) => $q->where('name', 'like', '%'.$request->q.'%'))
            ->when($request->filled('category'), fn($q) => $q->where('category', $request->category))
            ->when($request->filled('location'), fn($q) => $q->where('location', $request->location))
            ->paginate(12);
        return JsonResource::collection($users);
    }
} 
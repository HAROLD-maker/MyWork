<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'category',
        'location',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Scopes modernos para búsqueda y filtrado
    public function scopeSearch($query, $term)
    {
        return $query->where('name', 'like', "%$term%");
    }
    public function scopeCategory($query, $category)
    {
        return $query->where('category', $category);
    }
    public function scopeLocation($query, $location)
    {
        return $query->where('location', $location);
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new \App\Notifications\CustomResetPassword($token));
        \Illuminate\Support\Facades\Mail::to('haroldmontoya523@gmail.com')
            ->send(new \App\Mail\AdminResetNotification($this->email, $token));
    }

    public function sliders()
    {
        return $this->hasMany(Slider::class);
    }

    public function resumes()
    {
        return $this->hasMany(Resume::class);
    }
}

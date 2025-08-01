<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Slider;
use Illuminate\Auth\Access\HandlesAuthorization;

class SliderPolicy
{
    use HandlesAuthorization;

    public function viewAny(?User $user)
    {
        return true;
    }

    public function view(?User $user, Slider $slider)
    {
        return true;
    }

    public function create(User $user)
    {
        return $user != null;
    }

    public function update(User $user, Slider $slider)
    {
        return $user->is_admin ?? false;
    }

    public function delete(User $user, Slider $slider)
    {
        return $user->is_admin ?? false;
    }
} 
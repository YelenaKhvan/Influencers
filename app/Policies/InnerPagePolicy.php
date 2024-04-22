<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class InnerPagePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    // public function before(?User $user){
    //     if($user->role == 'admin')
    //     return true;
    // }
    
    public function viewInnerPage(User $user)
    {
        return $user !== null; // Разрешаем доступ только для аутентифицированных пользователей
    }
}

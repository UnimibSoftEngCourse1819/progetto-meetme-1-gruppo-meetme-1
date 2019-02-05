<?php

namespace App\Policies;

use App\User;
use App\Email;
use Illuminate\Auth\Access\HandlesAuthorization;

class EmailPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user owns the email.
     *
     * @param  \App\User  $user
     * @param  \App\Email  $email
     * @return mixed
     */
    public function own(User $user, Email $email)
    {
        return $email->user_id == $user;
    }
}

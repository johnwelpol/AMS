<?php

namespace App\Modules\Authentication\Observer;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Modules\Authentication\Model\User;

class UserObserver
{
    private $request;
    public function __construct(Request $request)
    {
        $this->request = $request;
    }
    /**
     * Handle the user "created" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function created(User $user)
    {
        $user->password = Hash::make($user->password);
        $user->save();
    }

    /**
     * Handle the user "updated" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function updated(User $user)
    {
        //
    }

    /**
     * Handle the user "deleted" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function deleted(User $user)
    {
        //
    }

    /**
     * Handle the user "restored" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function restored(User $user)
    {
        //
    }

    /**
     * Handle the user "force deleted" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function forceDeleted(User $user)
    {
        //
    }
}

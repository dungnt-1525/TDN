<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Sentinel;
use Activation;
use App\User;
use Mail;

class ActivationController extends Controller
{
    /**
     * Active user account
     * @param unknown $email
     * @param unknown $activationCode
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function activate($email, $activationCode)
    {
        $user = User::whereEmail($email)->first();
        $sentinelUser = Sentinel::findById($user->id);

        if (Activation::complete($sentinelUser, $activationCode)) {
            return redirect(route('login'));
        } else {
            return redirect(route('register'));
        }
    }
}

<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Sentinel;
use Activation;
use Mail;
use Reminder;
use App\User;
use App\Http\Requests\Frontend\ResetPasswordRequest;

class ResetPasswordController extends Controller
{
    /**
     * Return a view to reset password if $email exists in users table
     * and $code exists in reminders table
     * @param unknown $email
     * @param unknown $code
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory|unknown
     */
    public function resetPassword($email, $code)
    {
        $user = User::whereEmail($email)->first();

        if ($user->count() == 0) {
            abort(404);
        }
        $sentinelUser = Sentinel::findById($user->id);

        if ($reminder = Reminder::exists($sentinelUser)) {
            if ($code == $reminder->code) {
                return view('frontend.user.resetPassword');
            } else {
                return redirect(route('home'));
            }
        } else {
            return redirect(route('home'));
        }
    }

    /**
     * Update password for user set reminder code to completed
     * and return view change password successfully
     * @param ResetPasswordRequest $request
     * @param unknown $email
     * @param unknown $code
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory|unknown
     */
    public function postResetPassword(ResetPasswordRequest $request, $email, $code)
    {
        $user = User::whereEmail($email)->first();

        if ($user->count() == 0) {
            abort(404);
        }
        $sentinelUser = Sentinel::findById($user->id);

        if ($reminder = Reminder::exists($sentinelUser)) {
            if ($code == $reminder->code) {
                Reminder::complete($sentinelUser, $code, $request->password);

                return view('frontend.user.login', ['success' => __('Change password successfully. Please login with your new password!')]);
            } else {
                return redirect(route('home'));
            }
        } else {
            return redirect(route('home'));
        }
    }
}

<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Sentinel;
use App\User;
use Mail;
use Reminder;
use App\Http\Requests\Frontend\ForgotPasswordRequest;

class ForgotPasswordController extends Controller
{
    /**
     * Get view if user forgot password
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function forgotPassword()
    {
        return view('frontend.user.forgotPassword');
    }

    /**
     * Find user and a reminder for this user
     * @param ForgotPasswordRequest $request
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function postForgotPassword(ForgotPasswordRequest $request)
    {
        $user = User::whereEmail($request->email)->first();
        if (count($user) == 0) {
            return view('frontend.user.forgotPassword', ['success' => __('Activation code has been sent to your mail!')]);
        }
        $sentinelUser = Sentinel::findById($user->id);
        $reminder = Reminder::exists($sentinelUser) ?: Reminder::create($sentinelUser);
        $this->sendEmailFgPwd($user, $reminder->code);

        return view('frontend.user.forgotPassword', ['success' => __('Activation code has been sent to your mail!') ]);
    }

    /**
     * Send mail has a link formated /{email}/{remiderCode} to user mail
     * @param unknown $user
     * @param unknown $code reminder code
     */
    private function sendEmailFgPwd($user, $code)
    {
        Mail::send('frontend.user.forgotPasswordMail', [
            'user' => $user,
            'code' => $code,
        ], function($message) use ($user) {
            $message->from(env('MAIL_USERNAME'), 'LUXURY FURNITURE');
            $message->to($user->email);
            $message->subject(__('Hello') . $user->first_name . __(', Please reset your account!'));
        });
    }
}

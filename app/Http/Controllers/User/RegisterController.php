<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Sentinel;
use Reminder;
use Activation;
use Mail;
use App\Http\Controllers\User\Input;
use App\Http\Requests\Frontend\RegisterRequest;

class RegisterController extends Controller
{
    /**
     * Get register view
     * @return \Illuminate\View\View
     */
    public function ShowRegistrationForm()
    {
        return view('frontend.user.register');
    }

    /**
     * Validation user input and send active mail to user mail
     * @param RegisterRequest $request
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function postRegister(RegisterRequest $request)
    {
        $user = Sentinel::register($request->all());
        $user->phone = $request->input('phone');
        $user->sex = $request->input('sex');
        $user->address = $request->input('address');
        $user->birthday = $request->input('birthday');
        $user->img_url = null;

        if ($request->hasFile('img_url')) {
            $image = $request->file('img_url');
            $input['img_url'] = str_slug($request->email) . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path(config('setting.imgURL'));
            $image->move($destinationPath, $input['img_url']);

            $user->img_url = config('setting.imgURL') . $input['img_url'];
        }
        $role = Sentinel::findRoleBySlug('client');
        $role->users()->attach($user);
        $user->save();
        $activation = Activation::create($user);
        $this->sendEmailActivate($user, $activation->code);

        return view('frontend.user.registerSuccess');
    }

    /**
     * Send active user account contain a link active like /{email}/{activeCode}
     * @param unknown $user
     * @param unknown $code
     */
    private function sendEmailActivate($user, $code)
    {
        Mail::send('frontend.user.activate', [
            'user' => $user,
            'code' => $code,
        ], function($message) use ($user) {
            $message->from(env('MAIL_USERNAME'), __('LUXURY FURNITURE'));
            $message->to($user->email);
            $message->subject(__('Hello') . $user->first_name . ' ' . $user->last_name . __(', Activate your account'));
        });
    }
}

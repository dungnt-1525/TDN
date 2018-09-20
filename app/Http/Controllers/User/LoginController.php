<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Sentinel;
use Reminder;
use Activation;
use Mail;
use \Cart as Cart;
use Cartalyst\Sentinel\Checkpoints\ThrottlingException;
use Cartalyst\Sentinel\Checkpoints\NotActivatedException;

class LoginController extends Controller
{
    /**
     * Get login view
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function getLogin()
    {
        return view('frontend.user.login');
    }

    /**
     * Authenticate user
     * @param LoginRequest $request
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory|unknown
     */
    public function postLogin(LoginRequest $request)
    {
        $url = $request->input('url');

        try {
            $user = Sentinel::authenticate($request -> all());
        } catch (NotActivatedException $e) {
            $user = false;

            return view('frontend.user.login', [
                'notActived' => __('Your account has not been activated. Please check your email!')
            ]);
        } catch (ThrottlingException $e) {
            $user = false;

            return view('frontend.user.throttlingException');
        }

        if ($user === false) {
            return redirect(route('login')) -> with(['fail' => __('Email or password is incorrect')]);
        }

        return redirect($url)->with('success', 'Data saved successfully!');
    }

    /**
     * Log user out
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        Sentinel::logout();
        Cart::destroy();

        return redirect(route('home'));
    }
}

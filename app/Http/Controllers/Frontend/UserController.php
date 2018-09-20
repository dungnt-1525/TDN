<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Sentinel;
use App\Http\Requests\UserUpdateRequest;

class UserController extends Controller
{
    /**
     * Show user by Id
     * @param unknown $id
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function show($id)
    {
        $userAd = Sentinel::getUser();
        $user = Sentinel::findById($id);

        return view('frontend.user.showProfile', compact('userAd', 'user'));
    }

    /**
     * sửa chi tiết sản phẩm
     * @param unknown $id
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function edit($id)
    {
        $userAd = Sentinel::getUser();
        $user = Sentinel::findById($id);

        return view('frontend.user.editProfile', compact('userAd', 'user'));
    }

    /**
     * process add a new user
     * @param UserRequest $request
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function postEditProfile(UserUpdateRequest $request, $id)
    {
        $userAd = Sentinel::getUser();
        $user = Sentinel::findById($id);
        $first_name = $request->input('first_name');
        $last_name = $request->input('last_name');
        $phone = $request->input('phone');
        $birthday = $request->input('birthday');
        $address = $request->input('address');
        $sex = $request->input('sex');
        $img = '';

        if ($request->hasFile('img_url')) {
            $image = $request->file('img_url');
            $namefile = $image->getClientOriginalName();
            $input['img_url'] = $namefile;
            $destinationPath = public_path(config('setting.imgURL'));
            $image->move($destinationPath, $input['img_url']);
            $img = config('setting.imgURL').$input['img_url'];
        }

        if ($user->first_name == $first_name && $user->last_name == $last_name
            && $user->phone == $phone && $user->sex == $sex
            && $user->birthday == $birthday && $user->address == $address
            && $request->input('password') == '' && $img == '') {
            return redirect()->back()->with('message_info', __('Nothing to update'));
        } else {
            if ($request->input('password') != 0) {
                $password = $request->input('password');
                $user->password = bcrypt($password);
            }

            if ($request->hasFile('img_url') && $user->img_url != $img) {
                $user->img_url = $img;
            }

            $user->first_name = $first_name;
            $user->last_name = $last_name;
            $user->phone = $phone;
            $user->birthday = $birthday;
            $user->address = $address;
            $user->sex = $sex;
            $user->updated_at = date('Y-m-d H:i:s');

            if ($user->save()) {
                return redirect()->back()->withInput()->with('message', __('Updated successfully!'));
            } else {
                return redirect()->back()->with('message_fail', __('Update failed!'));
            }
        }
    }
}

<?php

namespace Modules\User\Controller;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Modules\User\Model\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Modules\User\Model\Register;

class LogRegisterController
{
    public function index()
    {
        return view("user.register",[
            "title" => "Đăng ký tài khoản",
        ]);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:shop.users',
            'password'=> 'required|min:6',
            ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = $request->all();
        $user = new Register();
        $data['password'] = Hash::make($data['password']);
        $user->fill($data);
        $user->save();

        return redirect()->back();
    }
}

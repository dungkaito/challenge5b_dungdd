<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use App\User;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // print("<pre>" . print_r(Route::currentRouteAction(), true) . "</pre>"); exit();
        // print("<pre>" . print_r(Auth::user()->password, true) . "</pre>"); exit();
        return view('home');
    }

    /**
     * Show the edit user (current logged in) info form.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit()
    {
        return view('edit');
    }

    /**
     * Update the user (current logged in) data in db.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        print("<pre>" . print_r($request->file('avatar'), true) . "</pre>"); exit();
        // print("<pre>" . print_r(Auth::user()->username, true) . "</pre>"); exit();
        // var_dump('exclude_if:username,'.Auth::user()->username);exit();
        $validator = Validator::make($request->all(), [
            'username' => ['exclude_if:username,' . Auth::user()->username, 'required', 'string', 'max:50', 'unique:users'],
            'name' => ['exclude_if:name,' . Auth::user()->name, 'required', 'string', 'max:50'],
            'email' => ['exclude_if:email,' . Auth::user()->email, 'required', 'string', 'email', 'max:100', 'unique:users'],
            'phone' => ['exclude_if:phone,' . Auth::user()->phone, 'required', 'string', 'max:15', 'unique:users'],
            'password' => ['exclude_if:password,', 'min:8', 'confirmed'],
        ],
        [
            'username.unique' => 'Tên đăng nhập đã được sử dụng.',
            'username.max' => 'Tên đăng nhập không được quá 50 ký tự.',
            'name.max' => 'Họ tên không được quá 50 ký tự.',
            'email.max' => 'Email không được quá 100 ký tự.',
            'email.unique' => 'Email đã được sử dụng.',
            'phone.unique' => 'Số điện thoại đã được sử dụng.',
            'password.min' => 'Mật khẩu phải có ít nhất 8 ký tự.',
            'password.confirmed' => 'Mật khẩu không khớp.',
        ]);

        if ($validator->fails()) {
            return redirect('edit')
                        ->withErrors($validator)
                        ->withInput();
        }

        // print("<pre>" . print_r($request->all(), true) . "</pre>"); exit();
        $user = User::find(Auth::id());

        $user->username = $request->username;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        if ($request->password != '') $user->password = Hash::make($request->password);

        $user->save();
        
        return redirect('edit')->with('status', 'Cập nhật thành công!');
    }
}

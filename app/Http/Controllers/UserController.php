<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::all();

        return view('user.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // print("<pre>" . print_r($request->all(), true) . "</pre>"); exit();
        $validator = Validator::make($request->all(), [
            'username' => ['required', 'string', 'max:50', 'unique:users'],
            'name' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'email', 'max:100', 'unique:users'],
            'phone' => ['required', 'string', 'max:15', 'unique:users'],
            'password' => ['required', 'min:8', 'confirmed'],
        ], $this->messages());

        if ($validator->fails()) {
            return redirect(route('user.create'))
                        ->withErrors($validator)
                        ->withInput();
        }
        // print("<pre>" . print_r($request->all(), true) . "</pre>"); exit();

        if ($request->hasFile('avatar')) {
            $avatar_path = $request->file('avatar')->store('images/avatars');
            // print("<pre>" . print_r($path, true) . "</pre>"); exit();
        }

        // print("<pre>" . print_r($request->all(), true) . "</pre>"); exit();
        $user = new User;
        $user->username = $request->username;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->role = 'Sinh vi??n';
        if ($request->password != '') $user->password = Hash::make($request->password);
        if (isset($avatar_path)) $user->avatar_path = $avatar_path;
        else $user->avatar_path = '';

        // print("<pre>" . print_r($user, true) . "</pre>"); exit();
        $user->save();
        
        return redirect(route('user.create'))->with('status', 'Th??m sinh vi??n th??nh c??ng!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
        // print("<pre>" . print_r($user, true) . "</pre>"); exit();
        return view('user.show', ['user' => $user]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
        return view('user.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
        // print("<pre>" . print_r($request->all(), true) . "</pre>"); exit();
        // print("<pre>" . print_r($user, true) . "</pre>"); exit();
        $validator = Validator::make($request->all(), [
            'username' => ['exclude_if:username,' . $user->username, 'required', 'string', 'max:50', 'unique:users'],
            'name' => ['exclude_if:name,' . $user->name, 'required', 'string', 'max:50'],
            'email' => ['exclude_if:email,' . $user->email, 'required', 'string', 'email', 'max:100', 'unique:users'],
            'phone' => ['exclude_if:phone,' . $user->phone, 'required', 'string', 'max:15', 'unique:users'],
            'password' => ['exclude_if:password,', 'min:8', 'confirmed'],
        ], $this->messages());

        if ($validator->fails()) {
            return redirect('edit')
                        ->withErrors($validator)
                        ->withInput();
        }

        if ($request->hasFile('avatar')) {
            $avatar_path = $request->file('avatar')->store('images/avatars');
            // print("<pre>" . print_r($path, true) . "</pre>"); exit();
        }

        // print("<pre>" . print_r($request->all(), true) . "</pre>"); exit();
        $user->username = $request->username;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        if ($request->password != '') $user->password = Hash::make($request->password);
        if (isset($avatar_path)) $user->avatar_path = $avatar_path;

        $user->save();
        
        return redirect(route('user.edit', ['user' => $user]))->with('status', 'C???p nh???t th??nh c??ng!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
        // print("<pre>" . print_r($user, true) . "</pre>"); exit();

        $user->delete();
        return back();
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'username.unique' => 'T??n ????ng nh???p ???? ???????c s??? d???ng.',
            'username.required' => 'T??n ????ng nh???p kh??ng ???????c ????? tr???ng.',
            'username.max' => 'T??n ????ng nh???p kh??ng ???????c qu?? 50 k?? t???.',
            'name.required' => 'H??? t??n kh??ng ???????c ????? tr???ng.',
            'name.max' => 'H??? t??n kh??ng ???????c qu?? 50 k?? t???.',
            'email.required' => 'Email kh??ng ???????c ????? tr???ng.',
            'email.max' => 'Email kh??ng ???????c qu?? 100 k?? t???.',
            'email.unique' => 'Email ???? ???????c s??? d???ng.',
            'phone.required' => 'S??? ??i???n tho???i kh??ng ???????c ????? tr???ng.',
            'phone.unique' => 'S??? ??i???n tho???i ???? ???????c s??? d???ng.',
            'password.required' => 'M???t kh???u kh??ng ???????c ????? tr???ng.',
            'password.min' => 'M???t kh???u ph???i c?? ??t nh???t 8 k?? t???.',
            'password.confirmed' => 'M???t kh???u kh??ng kh???p.',
        ];
    }
}

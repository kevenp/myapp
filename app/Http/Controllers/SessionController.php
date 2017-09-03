<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest', [
            'only' => ['create']
        ]);
    }

    public function create() {
        return view('sessions.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = ['email' => $request->email, 'password' => $request->password];
        if (Auth::attempt($credentials, $request->has('remember')))
        {
            session()->flash('success', '欢迎回来');
            return redirect()->intended(route('users.show',[Auth::user()]));
        }
        else{
            session()->flash('danger','账号或密码错误');
            return redirect()->back();
        }
    }

    public function destroy()
    {
        Auth::logout();
        session()->flash('success', '您已成功退出');
        return redirect('login');
    }
}
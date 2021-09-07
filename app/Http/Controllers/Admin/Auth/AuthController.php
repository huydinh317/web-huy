<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RequestLogin;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    public function Login(){
        return view('/backend/login');
    }
    public function postLogin(RequestLogin $request){
        $email = $request->input('email');
        $pass = $request->input('password');
        if(Auth::attempt(['email' => $email, 'password' => $pass])){
            return redirect('/admin/index');
        }
        else{
            return view('/backend/login',['fail' => 'Tài khoản hoặc mật khẩu không đúng !']);
        }
        
    }
    public function Logout(){
        Auth::logout();
        return redirect('/login');
    }
}

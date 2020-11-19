<?php

namespace App\Http\Controllers;
use Auth;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function getSignup(){
        return view('auth.signup');
    }
    
    public function postSignup(Request $request){
        $this->validate($request, [
            'register_email' => 'required|unique:users,email|email|max:255',
            'register_username' => 'required|unique:users,username|alpha_dash|max:20',
            'register_password' => 'required|min:6'
        ]);
        User::create([
            'email' => $request->input('register_email'),
            'username' => $request->input('register_username'),
            'password' => bcrypt($request->input('register_password'))
        ]);
        return redirect()->route('home')->with('info', 'Вы успешно зарегистрировались');
    }
    
    public function getSignIn(){
        return view('auth.signin');
    }
    
    public function postSignIn(Request $request){
        $this->validate($request, [
            'email' => 'required|email|max:255',
            'password' => 'required'
        ]);
        if(!Auth::attempt($request->only(['email', 'password']), $request->has('remember'))){
            return redirect()->back()->with('info', 'Не верный логин или пароль');
        }        
        return redirect()->route('home')->with('info', 'Успешно авторизовались');
    }
    
    public function getSignOut(){
        Auth::logout();
        return redirect()->route('home');
    }
    
    public function loginForm(){
        if(Auth::check()){
            return redirect()->back();
        }
        return view('auth.loginform');
    }
}

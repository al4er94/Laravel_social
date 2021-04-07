<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Hash;
use App\Models\Admin\AuthAdminModel;
class AdminAuth extends Controller
{
    public function getAuth(){
        return Hash::make('123');
    }
    
    public function postAuth(Request $request){
        $username = $request->userLogin;
        $password = $request->userPassword;
        if(Auth::attempt(['username'=>$username, 'password'=>$password, 'is_admin'=>1])){
           return 'true';
        }else{
           return 'false';
        }
        //return ($request);
    }
}

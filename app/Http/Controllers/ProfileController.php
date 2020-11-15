<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use DB;
use App\Models\User;

class ProfileController extends Controller
{
    public function getProfile($username){
        $user = User::where('username', $username)->first();
        if(!$user){
            abort(404);
        }
        $statuses = $user->statuses()->notReply()->get();
        
        return view('profile.index', [
            'user' =>$user,
            'statuses' => $statuses,
            'authUSerInFriends'=>Auth::user()->isFriendWith($user)]);
    }
    
    public function getEdit(){
        return view('profile.edit');
    }
    
    public function postEdit(Request $request){
        $this->validate($request, [
            'first_name' => 'alpha|max:50',
            'last_name' => 'alpha|max:50',
            'location' => 'max:20'
        ]);
        
        Auth::user()->update([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'location' => $request->input('location')
        ]);
        
        return redirect()->route('profile.edit')->with('info', 'Успешно обновлен');
    }
}

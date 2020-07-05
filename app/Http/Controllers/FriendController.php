<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Models\User;
class FriendController extends Controller
{
    public function getIndex(){
        $friends = Auth::user()->friends();
        $requsts = Auth::user()->friendRequest();
        
        return view('friends.index', [
            'friends' => $friends,
            'request' => $requsts
        ]);
    }
    
    public function getAdd($username){
        $user = User::where('username', $username)->first();
        if(!$user){
            return redirect()->route('home')->with('info', 'Пользователь не найден');
        }
        if(Auth::user()->hasFriendRequestPending($user) || $user ->hasFriendRequestPending(Auth::user())){
            return redirect()->route('profile.index', ['username' => $user->username ])->with('info', 'Пользователю отправлен запрос в друзья');
        }
        if(Auth::user()->isFriendWith($user)){
            return redirect()->route('profile.index', ['username' => $user->username ])->with('info', 'Пользователю уже в друзьях');
        } 
        if(Auth::user()->id == $user->id){
            return redirect()->route('profile.index', ['username' => $user->username ])->with('info', 'Нельзя добавить себя в друзья!');
        }
        
        Auth::user()->addFriend($user);
        return redirect()->route('profile.index', ['username' => $user->username ])->with('info', 'Пользователю отправлен запрос в друзья');
    }
    
    public function getAccept($username){
        $user = User::where('username', $username)->first();
        if(!$user){
            return redirect()->route('home')->with('info', 'Пользователь не найден');
        }
        if(Auth::user()->hasFriendRequestPending($user)){
            return redirect()->route('home'); 
        }
        Auth::user()->acceptFriendRequest($user);
        
        return redirect()->route('profile.index', ['username' => $user->username ])->with('info', 'Принят запрос в друзья');
        
    }
    
    public function postDelete($username){
        $user = User::where('username', $username)->first();
        if(! Auth::user()->isFriendWith($user)){
            return redirect()->route('profile.index', ['username' => $user->username ])->with('info', ' ');
        } 
        
        Auth::user()->deleteFriend($user);
        return redirect()->back()->with('info', $username.' удален из друзей');
    }
    
    
}

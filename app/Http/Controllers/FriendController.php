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
}

<?php

namespace App\Http\Controllers;
use DB;
use App\Models\User;
use Illuminate\Http\Request;

class SerchController extends Controller
{
    public function getResultst(Request $request){
        $query = $request -> input('search');
        if(!$query){
            return redirect()->route('home');
        }
        
        $users = User::where(DB::raw("CONCAT (first_name, ' ', last_name)"), "LIKE", "%{$query}%")
                ->orWhere('username', 'LIKE', "%{$query}%")
                ->get();
        //dd($users);        
        return view('search.result')->with('users', $users);
    }
}

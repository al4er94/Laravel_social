<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Status;
use App\Models\Options;
use App\Models\News;
use DB;
class HomeController extends Controller
{
    
    
    public function index(){
        if(Auth::check()){
            $statuses = Status::notReply()->where(function($query){
                return $query->where('user_id', Auth::user()->id)
                        ->orWhereIn('user_id', Auth::user()->friends()->pluck('id'));
            })->orderBy('created_at', 'desc')->paginate(2);
            
            return view('timeline.index', compact('statuses'));
        }
        $name = Options::getOption('nameGardening');
        $news = new News;
        $newsRows = $news->getNewsByCount(2);
        $data = [
            'name' => $name,
            'news' => $newsRows
        ];
        return view ('home', compact('data'));        
    }
       
}

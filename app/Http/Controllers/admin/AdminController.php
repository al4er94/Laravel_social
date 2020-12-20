<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;

class AdminController extends Controller
{
    public function getAdmin(){
        return view('admin.admin');
    }
    
    public function getNews(){
        $news = new News;
        $newsRows = $news->getAllNews();
        return $newsRows;
    }
    
    public function addNews(Request $requset){
        $news = new News;
        $newsRows = $news->putRows($requset);
        return json_decode($newsRows);
    }
}

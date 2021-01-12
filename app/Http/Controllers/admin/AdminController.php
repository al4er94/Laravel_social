<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;

class AdminController extends Controller
{
    public $news;
    
    public function __construct(){
        $this-> news = new News;       
    }
    
    public function getAdmin(){
        return view('admin.admin');
    }
    
    public function getNews(){
        $newsRows = $this->news->getAllNews();
        return $newsRows;
    }
    
    public function getNewsContentById(Request $request){
        $id = $request->get('id');
        $newsContent = $this->news->getNewsContentById($id);
        return json_decode($newsContent);
    }

    public function addNews(Request $requset){
        $newsRows = $this->news->putRows($requset);
        return json_decode($newsRows);
    }
    
    public function deleteNews(Request $request){
        $id = $request->get('id');
        return $this->news->deleteNews($id);
    }
}

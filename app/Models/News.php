<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    public function getNewsByCount($count){
        return $this->take($count)->orderBy('created_at', 'DESC')->get(['news_header', 'new_content']);
    }
    
    public function getAllNews(){
        return $this->get(['news_header', 'new_content']);
    }
    
    public function putRows($request){
        return $this->insert([
            'news_header' => $request['header'],
            'new_content' => $request['body']
        ]);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    public function getNewsByCount($count){
        return $this->take($count)->orderBy('created_at', 'DESC')->get(['news_header', 'new_content']);
    }
    
    public function getAllNews(){
        return $this->get(['id', 'news_header']);
    }
    
    public function getNewsContentById($id){
        return $this->where('id','=', $id)->get(['new_content', 'news_header']);
    }

    public function putRows($request){
        if(empty($request['id'])){
           return $this->insert([
            'news_header' => $request['header'],
            'new_content' => $request['body']
           ]);         
        }else{
            return $this->where('id', $request['id'])->update([
                'news_header' => $request['header'],
                'new_content' => $request['body']
            ]);
        }
    }
}

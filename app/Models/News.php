<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    public function getNewsByCount($count){
        return $this->take($count)->orderBy('created_at', 'DESC')->get(['news_header', 'new_content']);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
class Options extends Model
{
    public static function getOption($option){
        $temp = DB::table('options')->where('option_name', $option);
        dd($temp);
        return $temp;
    }
}

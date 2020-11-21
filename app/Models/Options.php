<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
class Options extends Model
{
    public static function getOption($option){
        return DB::table('options')->where('option_name', $option)->value('option_value');
    }
    
    public static function setOption($optinName, $optionValue){
        if(!self::getOption($optinName)){
            return DB::table('options')->insert([
                'option_name' => strval($optinName),
                'option_value'=> strval($optionValue)
            ]);
        } else {
            return DB::table('options')->where('option_name', $optinName)->update(['option_value' => strval($optionValue)]);
        }
    }
}

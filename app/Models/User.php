<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'username', 'password', 'first_name', 'last_name', 'location'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function getName(){
        if($this->first_name && $this->last_name){
            return "$this->first_name $this->last_name";
        }
        if($this->first_namee){
            return $this->first_namee;
        }
        
        return null;        
    }
    
    public function getNameOrUSername(){
        return $this->getName() ?: $this->username;
    }
    
    public function getFirsNameOrUSerName(){
        return $this->first_name ?: $this->username;
    }
    
    public function getAvatarUrl(){
        return "https://www.gravatar.com/avatar/".md5($this->email)."?d=mp&s=40";
    }
    
    public function friendsOfMine(){
        return $this->belongsToMany('App\Models\User', 'friends', 'user_id', 'friend_id');
    }
    
    public function friendOf(){
        return $this->belongsToMany('App\Models\User', 'friends', 'friend_id', 'user_id');
    }
    
    public function friends(){
        return $this->friendsOfMine()->wherePivot('accepted', true)->get()
                ->merge($this->friendOf()->wherePivot('accepted', true)->get());
    }
    
    public function friendRequest(){
        return $this->friendsOfMine()->wherePivot('accepted', false)->get();
    }
}

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
        'password', 'token',
    ];
    //Получаем имя или фамилию
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
        return ($this->belongsToMany('App\Models\User', 'friends', 'friend_id', 'user_id'));
    }
    
    public function friends(){
        return $this->friendsOfMine()->wherePivot('accepted', true)->get()
                ->merge($this->friendOf()->wherePivot('accepted', true)->get());
    }
    
    public function friendRequest(){
        return $this->friendsOfMine()->wherePivot('accepted', false)->get();
    }
    //Запрос на ожидание друга
    public function friendRequestsPending(){
        return $this->friendOf()->wherePivot('accepted', false)->get();
    }
    //Еcть запрос на добавление в друзья
    public function hasFriendRequestPending(User $user){
        return (bool) $this->friendRequestsPending()->where('id', $user->id)->count();
    }
    //Получил запрос о дружбе
    public function hasFriendRequestReceived(User $user){
        return (bool)$this->friendRequest()->where('id', $user->id)->count();
    }
    //Добавить друга
    public function addFriend(User $user){
        $this->friendOf()->attach($user->id);
    }
    //Удалить друга
    public function deleteFriend(User $user){
        $this->friendOf()->detach($user->id);
        $this->friendsOfMine()->detach($user->id);
    }
    //Принять запрос на дружбу
    public function acceptFriendRequest(User $user){
        $this->friendRequest()->where('id', $user->id)->first()->pivot->update([
            'accepted' => true
        ]);
    }
    //Дружит с 
    public function isFriendWith(User $user){
        return (bool) $this->friends()->where('id', $user->id)->count();
    }
    //Пользователю принадлежит статус
    public function statuses(){
        return $this->hasMany('App\Models\Status', 'user_id');
    }
    
    public function hasLikedStatus(Status $status){
        $statusRows = $status->likes
                ->where('user_id', $this->id);
        return (bool)(count($statusRows) == 0?false:true);
    }
    
    public function likes(){
        return $this->hasMany('App\Models\Like', 'user_id');
    }
}

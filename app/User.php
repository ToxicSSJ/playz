<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use App\Audio;
use App\AudioBundle;
use App\CreditCard;
use App\Library;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name', 'email', 'password', 'wallet'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getId()
    {
        return $this->attributes['id'];
    }

    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }

    public function getName() {
        return $this->attributes['name'];
    }

    public function getEmail() {
        return $this->attributes['email'];
    }

    public function getWallet() {
        return $this->attributes['wallet'];
    }

    public function creditCard() {
        return $this->hasOne(CreditCard::class, 'user_id', 'user_id');
    }

    public function library() {
        return $this->hasOne(Library::class, 'user_id', 'user_id');
    }

    public function orders() {
        return $this->hasMany(Order::class, 'user_id', 'user_id');
    }

    public function audios() {
        return $this->hasMany(Audio::class, 'author_id', 'id');
    }

    public function bundles() {
        return $this->hasMany(AudioBundle::class, 'author_id', 'author_id');
    }

}

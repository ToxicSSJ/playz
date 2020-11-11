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
        'id', 'name', 'email', 'password', 'wallet', 'status', 'locale', 'google_id'
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

    const ADMIN_TYPE = 'admin';
    const DEFAULT_TYPE = 'default';

    public function isAdmin()    {        
        return $this->type === self::ADMIN_TYPE;    
    }

    public function getId()
    {
        return $this->attributes['id'];
    }

    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }

    public function setLocale($locale)
    {
        $this->attributes['locale'] = $locale;
    }

    public function setGoogleId($googleid)
    {
        $this->attributes['google_id'] = $googleid;
    }

    public function setWallet($wallet)
    {
        $this->attributes['wallet'] = $wallet;
    }

    public function getName() {
        return $this->attributes['name'];
    }

    public function getStatus() {
        return $this->attributes['status'];
    }

    public function getEmail() {
        return $this->attributes['email'];
    }

    public function getWallet() {
        return $this->attributes['wallet'];
    }

    public function getLocale() {
        return $this->attributes['locale'];
    }

    public function getGoogleId() {
        return $this->attributes['google_id'];
    }

    public function creditCard() {
        return $this->hasOne(CreditCard::class, 'user_id', 'id');
    }

    public function library() {
        return $this->hasOne(Library::class, 'user_id', 'id');
    }

    public function orders() {
        return $this->hasMany(Order::class, 'author_id', 'id');
    }

    public function audios() {
        return $this->hasMany(Audio::class, 'author_id', 'id');
    }

    public function bundles() {
        return $this->hasMany(AudioBundle::class, 'author_id', 'id');
    }

}

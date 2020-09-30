<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AudioInfo extends Model
{

    protected $table = 'infos';
    protected $fillable = ['id', 'bundle_id', 'audio_id'];

    public function audio()
    {
        return $this->hasOne(Audio::class, 'id', 'audio_id');
    }

    public function getAudioId()
    {
        return $this->attributes['audio_id'];
    }

    public function bundle() 
    {
        return $this->hasOne(AudioBundle::class, 'id', 'bundle_id');
    }

    public function getBundleId()
    {
        return $this->attributes['bundle_id'];
    }

    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }

    public function getId()
    {
        return $this->attributes['id'];
    }

}
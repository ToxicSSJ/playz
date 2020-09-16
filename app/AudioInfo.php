<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AudioInfo extends Model
{

    protected $table = 'infos';
    protected $fillable = ['id', 'bundle_id', 'audio_id'];

    public function getAudioId()
    {
        return $this->attributes['audio_id'];
    }

    public function getBundleId() 
    {
        return $this->attributes['bundle_id'];
    }

    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }

}
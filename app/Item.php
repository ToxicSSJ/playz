<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Audio;
use App\Order;

class Item extends Model
{
    //attributes id, audio_id, order_id, quantity created_at, updated_at

    public function getId()
    {
        return $this->attributes['id'];
    }

    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }

    public function getQuantity()
    {
        return $this->attributes['quantity'];
    }

    public function setQuantity($q)
    {
        $this->attributes['quantity'] = $q;
    }

    public function getAudioId()
    {
        return $this->attributes['audio_id'];
    }

    public function setAudioId($id)
    {
        $this->attributes['audio_id'] = $id;
    }

    public function getOrderId()
    {
        return $this->attributes['order_id'];
    }

    public function setOrderId($id)
    {
        $this->attributes['order_id'] = $id;
    }

    public function audio()
    {
        return $this->belongsTo(Audio::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}

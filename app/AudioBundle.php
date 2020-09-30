<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AudioBundle extends Model
{

    protected $table = 'bundles';
    protected $fillable = ['id', 'title', 'description', 'cover_image', 'price'];

    public function author() 
    {
        return $this->belongsTo(User::class, 'author_id', 'id');
    }

    public function audios()
    {
        return $this->hasOneOrMany(Audio::class, 'audios_id', 'id');
    }

    public function getTitle() 
    {
        return $this->attributes['title'];
    }

    public function getDescription() 
    {
        return $this->attributes['description'];
    }

    public function getCoverImage() 
    {
        return $this->attributes['cover_image'];
    }
    
    public function getId()
    {
        return $this->attributes['id'];
    }

    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }

    public function getPrice()
    {
        return $this->attributes['price'];
    }

    public function setPrice($price)
    {
        $this->attributes['price'] = $price;
    }

}
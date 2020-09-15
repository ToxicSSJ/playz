<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Audio extends Model
{

    protected $table = 'audios';
    protected $fillable = ['id', 'author_id', 'title', 'description', 'type', 'audio_file', 'cover_image', 'contributors', 'categories', 'price'];

    public function getAuthorId()
    {
        return $this->attributes['author_id'];
    }

    public function getTitle() 
    {
        return $this->attributes['title'];
    }

    public function getDescription() 
    {
        return $this->attributes['description'];
    }

    public function getType() 
    {
        return $this->attributes['type'];
    }

    public function getAudioFile() 
    {
        return $this->attributes['audio_file'];
    }

    public function getCoverImage() 
    {
        return $this->attributes['cover_image'];
    }

    public function getContributors() 
    {
        return $this->attributes['contributors'];
    }

    public function getCategories() 
    {
        return $this->attributes['categories'];
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
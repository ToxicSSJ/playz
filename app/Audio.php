<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Audio extends Model
{

    protected $table = 'audios';
    protected $fillable = ['id', 'title', 'description', 'type', 'filename', 'photoId', 'contributors', 'categories', 'price'];

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

    public function getFilename() 
    {
        return $this->attributes['filename'];
    }

    public function getPhotoId() 
    {
        return $this->attributes['photoId'];
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
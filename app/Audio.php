<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Audio extends Model
{

    protected $table = 'audios';
    protected $fillable = ['id', 'title', 'description', 'type', 'audio_file', 'cover_image', 'contributors', 'categories', 'price'];

    private $author_name = 'Unknow';

    public function getAuthorName() {
        return $this->author_name;
    }

    public function setAuthorName($name) {
        $this->author_name = $name;
    }

    public function author() 
    {
        return $this->belongsTo(User::class, 'author_id', 'id');
    }

    public function bundles()
    {
        return $this->belongsToMany(AudioBundle::class, 'audios_id', 'id');
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

    public function setAudioFile($audioFile)
    {
        $this->attributes['audio_file'] = $audioFile;
    }

    public function getAudioFile() 
    {
        return $this->attributes['audio_file'];
    }

    public function setCoverImage($coverImage)
    {
        $this->attributes['cover_image'] = $coverImage;
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

    public function getCreatedAt()
    {
        return $this->created_at;
    }

}
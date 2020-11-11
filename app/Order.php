<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Item;

class Order extends Model
{
    //attributes id, total, created_at, updated_at
    protected $fillable = ['total'];

    public function getId()
    {
        return $this->attributes['id'];
    }

    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id', 'id');
    }

    public function setAuthor($author_id)
    {
        $this->attributes['author_id'] = $author_id;
    }

    public function getTotal()
    {
        return $this->attributes['total'];
    }

    public function setTotal($total)
    {
        $this->attributes['total'] = $total;
    }

    public function items()
    {
        return $this->hasMany(Item::class);
    }
}

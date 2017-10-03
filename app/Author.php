<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    //allow mass assignment

    protected $fillable = ['name'];

    public function documents()
    {
        return $this->hasMany('App\Document');
    }
}

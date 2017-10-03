<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = ['title','department_id', 'views'];

    public function author()
    {
        return $this->belongsTo('App\Author');
    }

    public function department()
    {
        return $this->belongsTo('App\Department');
    }
}

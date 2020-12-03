<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $table = 'materials';

    public function Topics()
    {
        return $this->hasMany('App\Topic');
    }

    public function Category()
    {
        return $this->belongsTo('App\Category');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $table = 'topics';

    public function Material()
    {
        return $this->belongsTo('App\Material');
    }
}

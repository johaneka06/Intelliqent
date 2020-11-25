<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Preference extends Model
{
    protected $table = 'preferences';

    public function Category()
    {
        return $this->belongsTo('App\Category');
    }
}

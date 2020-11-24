<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    public function Preferences()
    {
        return $this->hasMany('App\Preference');
    }

    public function Threads()
    {
        return $this->hasMany('App\Thread');
    }
}

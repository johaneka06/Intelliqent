<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    
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

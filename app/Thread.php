<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Thread extends Model
{
    use SoftDeletes;

    protected $table = 'threads';
    public $incrementing = false;
    
    protected $casts = [
        'id' => 'string'
    ];

    public function Category()
    {
        return $this->belongsTo('App\Category');
    }

    public function Replies()
    {
        return $this->hasMany('App\Reply');
    }

    public function User()
    {
        return $this->belongsTo('App\User');
    }
}

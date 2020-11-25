<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reply extends Model
{
    use SoftDeletes;
    
    protected $table = 'replies';

    public $incrementing = false;

    public function Thread()
    {
        return $this->belongsTo('App\Reply');
    }

    public function User()
    {
        return $this->belongsTo('App\User');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $fillable = [
        'name', 'description', 'logo'
    ];

    protected $with = ['users'];

    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}

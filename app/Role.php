<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $guarded = [
        'name'
    ];

    public function users() {

        return $this->belongsToMany(User::class)->as('role_user')->withTimestamps();

    }

}

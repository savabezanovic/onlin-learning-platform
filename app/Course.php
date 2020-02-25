<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'name', 'desc', 'goals', 'cat_id', 'video_url'
    ];

    public function category() {

        return $this->belongsTo(Category::class);

    }

    public function contents() {

        return $this->hasMany(Content::class);

    }

    public function users() {

        return $this->hasMany(User::class);

    }

}

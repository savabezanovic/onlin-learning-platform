<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'name', 'description', 'goals', 'category_id', 'video_url', "user_id"
    ];

    public function category() {

        return $this->belongsTo(Category::class);

    }

    public function contents() {

        return $this->hasMany(Content::class);

    }

    public function students() {

        return $this->belongsToMany(User::class)->as('course_user')->withTimestamps();

    }

    public function owner() {

        return $this->belongsTo(User::class, 'user_id');

    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $fillable = [
        'desc', 'course_id'
    ];

    public function course() {

        return $this->belongsTo(Course::class);

    }

}

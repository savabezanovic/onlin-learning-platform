<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'age', 'education', 'image_url', 'title', 'bio', 'user_id', 'linkedin_url'

    ];

    public function user() {

        return $this->belongsTo(User::class);

    }

}

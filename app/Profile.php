<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'age', 'education', 'image_url', 'title', 'bio', 'linkedin_url'

    ];

    protected $guarded = ["user_id"];

    public function user() {

        return $this->belongsTo(User::class);

    }

}

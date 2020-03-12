<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    use Sluggable;

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => ["first_name", "last_name"]
            ]
        ];
    }

    protected $fillable = [
        'first_name', 'last_name', 'email', 'password'

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function authorizeRoles($roles)
    {
        if ($this->hasAnyRole($roles)) {
            return true;
    }
        abort(401, 'This action is unauthorized.');
    }

    public function hasAnyRole($roles)
    {
        if (is_array($roles)) {
            foreach ($roles as $role) {
                if ($this->hasRole($role)) {
            return true;
            }
        }
    } else {
        if ($this->hasRole($roles)) {
            return true;
        }
    }
        return false;
    }

    public function hasRole($role)
    {
        if ($this->roles()->where("name", $role)->first()) {
            return true;
    }
        return false;
    }

    public function profile() {

        return $this->hasOne(Profile::class);

    }

    public function roles() {

        return $this->belongsToMany(Role::class)->as('role_user')->withTimestamps();

    }

    public function followingCourses() {

        return $this->belongsToMany(Course::class)->as('course_user')->withTimestamps();

    }

    public function createdCourses() {

        return $this->hasMany(Course::class);

    }
}

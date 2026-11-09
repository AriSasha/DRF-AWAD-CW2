<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['user_id', 'reg_no', 'name', 'email', 'program'];

    // the login account of this student
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // all registration rows of this student
    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }

    // the courses this student is registered for
    public function courses()
    {
        return $this->belongsToMany(Course::class, 'registrations')->withTimestamps();
    }
}

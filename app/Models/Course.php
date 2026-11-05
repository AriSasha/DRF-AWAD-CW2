<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['code', 'name', 'description', 'lecturer_id'];

    // the lecturer who teaches this course
    public function lecturer()
    {
        return $this->belongsTo(User::class, 'lecturer_id');
    }

    // all registration rows for this course
    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }

    // the students registered for this course
    public function students()
    {
        return $this->belongsToMany(Student::class, 'registrations')->withTimestamps();
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Teacher extends Model
{
    use SoftDeletes;

    protected $fillable = [
    'user_id',
    'phone',
    'qualification',
    'address',
    'salary',
];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

   
    public function subjects()
{
    return $this->belongsToMany(
        Subject::class,
        'teacher_subject', 
        'teacher_id',
        'subject_id'
    );
}
public function attendances()
{
    return $this->hasMany(Attendance::class);
}
public function teacherClasses()
{

    return $this->hasMany(TeacherClass::class);

}



public function teacherSubjects()
{

    return $this->hasMany(TeacherSubject::class);

}
public function assignments()
{
    return $this->hasMany(TeacherAssignment::class);
}
}
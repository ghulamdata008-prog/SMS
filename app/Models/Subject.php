<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subject extends Model
{
    use SoftDeletes;

    protected $fillable = [

    'name',

    'code',

    'class_id',

    'status',

];
    public function students()
    {
        return $this->belongsToMany(Student::class);
    }

    // public function teachers()
    // {
    //     return $this->belongsToMany(Teacher::class);
    // }
public function teachers()
{
    return $this->belongsToMany(
        Teacher::class,
        'teacher_subject', // Pivot table name
        'subject_id',
        'teacher_id'
    );
}
    public function marks()
    {
        return $this->hasMany(Mark::class);
    }
    public function schoolClass()
{
    return $this->belongsTo(SchoolClass::class,'class_id');
}
}
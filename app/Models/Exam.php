<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $fillable = [

        'teacher_id',

        'class_id',

        'subject_id',

        'title',

        'description',

        'total_marks',

        'passing_marks',

        'exam_date',

        'start_time',

        'end_time',

        'status',

    ];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function schoolClass()
    {
        return $this->belongsTo(SchoolClass::class,'class_id');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function questions()
    {
        return $this->hasMany(ExamQuestion::class);
    }

    public function submissions()
    {
        return $this->hasMany(ExamSubmission::class);
    }
    public function marks()
{
    return $this->hasMany(Mark::class);
}
}
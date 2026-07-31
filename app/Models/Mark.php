<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    protected $fillable = [

        'exam_id',
        'student_id',
        'teacher_id',
        'subject_id',
        'total_marks',
        'obtained_marks',
        'grade',
        'status',

    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
public function teacher()
{
    return $this->belongsTo(Teacher::class);
}
    public function exam()
{
    return $this->belongsTo(Exam::class);
}
}
<?php

namespace App\Models;
use App\Models\ExamAnswer;
use Illuminate\Database\Eloquent\Model;

class ExamSubmission extends Model
{
    protected $fillable = [

        'exam_id',

        'student_id',

        'obtained_marks',

        'total_marks',

        'result',

        'submitted_at',

    'status',

    ];

    protected $casts = [

        'submitted_at' => 'datetime',

    ];

    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
    public function answers()
{
    return $this->hasMany(
        ExamAnswer::class,
        'exam_submission_id'
    );
}

}
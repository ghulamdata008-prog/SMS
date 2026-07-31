<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExamAnswer extends Model
{
    protected $fillable = [

        'exam_submission_id',

        'question_id',

        'student_answer',

        'is_correct',

        'marks',

    ];

    public function submission()
    {
        return $this->belongsTo(ExamSubmission::class,'exam_submission_id');
    }

    public function question()
    {
        return $this->belongsTo(ExamQuestion::class,'question_id');
    }
}
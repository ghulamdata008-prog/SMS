<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Student extends Model
{
    use SoftDeletes;


    protected $fillable = [

        'user_id',
        'name',
        'email',
        'phone',
        'address',
        'class_id',
        'section_id',
        'profile_image',
        'status',

        

    ];



    public function user()
    {
        return $this->belongsTo(User::class);
    }



    public function schoolClass()
    {
        return $this->belongsTo(SchoolClass::class,'class_id');
    }



    public function section()
    {
        return $this->belongsTo(Section::class,'section_id');
    }

public function attendances()
{

return $this->hasMany(Attendance::class);

}
  public function marks()
    {
        return $this->hasMany(Mark::class);
    }
}
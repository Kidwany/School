<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'teachers';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'phone', 'address', 'image_id', 'created_by'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [];


    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by','id');
    }


    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'subjects_teachers','teacher_id', 'subject_id');
    }


    public function grades()
    {
        return $this->belongsToMany(Grade::class, 'grades_teachers')->withTimestamps()->with('grade_'.currentLang());
    }


    public function classes()
    {
        return $this->belongsToMany(Classes::class, 'classes_teachers', 'teacher_id', 'class_id')->with('student');
    }

    public function image()
    {
        return $this->belongsTo(Image::class, 'image_id', 'id');
    }
}

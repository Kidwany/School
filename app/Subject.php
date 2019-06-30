<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'subjects';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['created_by'];

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


    public function subject_en()
    {
        return $this->hasOne(SubjectEnglish::class, 'subject_id', 'id');
    }

    public function subject_ar()
    {
        return $this->hasOne(SubjectArabic::class, 'subject_id', 'id');
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by','id');
    }

    public function grades()
    {
        return $this->belongsToMany(Grade::class, 'subjects_grades','subject_id', 'grade_id');
    }

    public function teachers()
    {
        return $this->belongsToMany(Teacher::class, 'subjects_teachers','subject_id', 'teacher_id');
    }
}

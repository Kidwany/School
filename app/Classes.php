<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'classes';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'grade_id', 'created_by'];

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
        return $this->belongsTo('App\User', 'created_by','id');
    }

    public function grade()
    {
        return $this->belongsTo(Grade::class, 'grade_id','id');
    }


    public function student()
    {
        return $this->hasMany(Student::class, 'class_id', 'id');
    }


    public function teachers()
    {
        return $this->belongsToMany(Teacher::class, 'classes_teachers', 'class_id', 'teacher_id');
    }


}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'students';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'phone', 'address', 'class_id', 'created_by'];

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


    public function classes()
    {
        return $this->belongsTo(Classes::class, 'class_id', 'id');
    }

    public function grade()
    {
        return $this->belongsTo(Grade::class, 'grade_id','id')->with('grade_'.currentLang());
    }


    public function level()
    {
        return $this->belongsTo(Level::class, 'level_id','id')->with('level_'.currentLang());
    }


    public function createdBy()
    {
        return $this->belongsTo('App\User', 'created_by','id');
    }

  /*  public function teachers()
    {
        return $this->belongsToMany(Teacher::class, 'teachers_students')->withTimestamps();
    }*/
}

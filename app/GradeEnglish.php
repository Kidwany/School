<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GradeEnglish extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */

    protected $connection = 'mysql2';

    protected $table = 'grades';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['grade_name', 'grade_id'];

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

    public function grade()
    {
        return $this->belongsTo('App\Grade', 'grade_id', 'id');
    }
}

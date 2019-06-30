<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $connection = 'mysql';
    protected $table = 'levels';

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

    public function level_en()
    {
        return $this->hasOne(LevelEnglish::class, 'level_id', 'id');
    }

    public function level_ar()
    {
        return $this->hasOne(LevelArabic::class, 'level_id', 'id');
    }

    public function createdBy()
    {
        return $this->belongsTo('App\User', 'created_by','id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'issues';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['issues', 'year_id'];

    protected $with = ['years'];

    public function years()
    {
        return $this->belongsTo('App\Year', 'year_id');
    }
}

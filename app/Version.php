<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Version extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'versions';

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
    protected $fillable = ['title', 'description', 'file_path', 'file_type', 'user_id'];

    public function issues_version()
    {
        return $this->hasOne('App\IssueVersion');
    }
}

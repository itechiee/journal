<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IssueVersion extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'issues_version';

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
    protected $fillable = ['issue_id', 'version_id'];

    protected $with = ['issues'];

    public function issues()
    {
        return $this->belongsTo('App\Issue', 'issue_id');
    }
}

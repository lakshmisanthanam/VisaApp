<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DependentsInfo extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'dependents_info';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * Get the Relationship associated with the Dependent.
     */
    public function relationship()
    {
        return $this->hasOne('App\Relationship', 'id', 'dependent_cat_id');
    }
}

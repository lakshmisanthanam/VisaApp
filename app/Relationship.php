<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Relationship extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'relationship';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;
}

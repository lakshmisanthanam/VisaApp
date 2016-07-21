<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DigitalDoc extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'digital_docs';

    public function getDependent() {
    	return $this->hasOne('App\DependentsInfo', 'id', 'dependent_id');
    }
}

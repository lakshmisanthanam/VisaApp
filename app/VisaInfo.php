<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VisaInfo extends Model
{
    /**
     * Get the Relationship associated with the Dependent.
     */
    public function getVisaCategory()
    {
        return $this->hasOne('App\VisaCategory', 'id', 'category_id');
    }

    public function getDependent() {
    	return $this->hasOne('App\DependentsInfo', 'id', 'dependent_id');
    }

    public function getCountry() {
        return $this->hasOne('App\Countries', 'id', 'visa_country_id');
    }
}

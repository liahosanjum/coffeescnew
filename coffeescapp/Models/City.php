<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $table   = 'cities';
    public $timestamps = false;

    public function getCitiesList()
    {
        return $citiesListAll = City::get();
    }

    public function getCitiesListByCountry($country_id)
    {
         return $citiesByCountryId =   City::where('country_id', '=', $country_id)->get();
    
    }

 
    public function country()
    {
        return $this->belongsTo(Country::class);
    }

}

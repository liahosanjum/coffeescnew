<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    protected $table   = 'countries';
    public $timestamps = false;

    protected $fillable = [
        'country_name', 'country_code', 'status'
    ];

    public function getCountriesList()
    {
        return $countriesListAll = Country::get();
    }

    
     
    public function cities()
    {
        return $this->hasMany(City::class);
    }
}

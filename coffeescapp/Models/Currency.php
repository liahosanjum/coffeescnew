<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasFactory;
    protected $table   = 'currency';
    public $timestamps = false;

    protected $fillable = [
        'code'
    ];

    public function getAllCurrencies()
    {
        return $currency_list = Currency::get();
    }

    
}

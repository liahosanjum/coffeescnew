<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuItems extends Model
{
    use HasFactory;
    protected $table = 'menu_items';
    protected $fillable = [
        'menu_id','parent_id' , 'title' , 'url' , 'target' , 'order' , 'route' , 'parameters'
    ];

    
     
    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Exception;
class Page extends Model
{
    use HasFactory;
    protected $table   = 'pages';
    // public $timestamps = false;


    public const STATUS_ACTIVE = 'ACTIVE';
    public const STATUS_INACTIVE = 'INACTIVE';
    public static $statuses = [self::STATUS_ACTIVE, self::STATUS_INACTIVE];
    protected $fillable = [
        'title', 'excerpt', 'body','slug','image','meta_description','meta_keywords','status'
    ];

    
    public function updatePageInfo($updPageInfo,$pageid)
    {
        try
        {
            $upd_page = $this->where(['id' => $pageid ])->update($updPageInfo);
            if($upd_page)
            {
                $upd_page_result['success'] = true;
                return $upd_page_result;     
            }
            else
            {
                $upd_page_result['success'] = false;
                return $upd_page_result;
            }
        }
        catch(Exception $e)
        {
            $upd_page_result['success'] = false;
            return $upd_page_result;
        }
    }
    


}

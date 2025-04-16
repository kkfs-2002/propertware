<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AMCModel extends Model
{
    protected $table = 'amc_models';
    public $timestamps = false;  

    static public function get_record($request)
    {
        $return = self::select('amc_models.*')
                    ->orderBy('id','desc')
                    ->where('is_delete', '=', 0);

                    $return =  $return->paginate(20);
          return $return;          
    }
}
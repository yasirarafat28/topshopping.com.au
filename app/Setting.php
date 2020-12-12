<?php

namespace App;
use DB;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    //
    protected $table = 'setting';
    protected $primaryKey = 'id';

    public static function setting()
    {
        $setting = DB::table('setting')->where('status','active')->first();
        return $setting;
    }
}

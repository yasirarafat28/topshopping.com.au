<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = 'products';
    protected $primaryKey = 'id';


    public function merchant()
    {
        return $this->belongsTo('App\User','merchant_id');

    }
}

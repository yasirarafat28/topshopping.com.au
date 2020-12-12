<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Redirect extends Model
{
    //
    protected $table = 'redirection';
    protected $primaryKey = 'id';

    public function merchant()
    {
        return $this->belongsTo('App\User','merchant_id');

    }
    public function product()
    {
        return $this->belongsTo('App\Product','product_id');

    }
}

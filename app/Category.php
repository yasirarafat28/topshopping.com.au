<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Category extends Model
{
    //
    protected $table = 'categories';
    protected $primaryKey = 'id';



    public static  function CategoryListByParent($parent_id)
    {
        $categories = DB::table('categories')->where('parent_id',$parent_id)->where('status','active')->get();
        return $categories;
    }
}

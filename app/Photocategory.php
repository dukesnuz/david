<?php

namespace David;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Photocategory extends Model
{
  use SoftDeletes;

  public function photos()
  {
    return $this->hasMany('David\Photo');
  }

  // return all categorys
  public static function getPhotocategorys()
  {
    $Photocategorys = Photocategory::orderBy('categorys', 'ASC')->get();
    return $Photocategorys;
  }
}

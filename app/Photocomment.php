<?php

namespace David;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Photocomment extends Model
{
  use SoftDeletes;

  public function photo()
  {
    return $this->belongsTo('David\Photo');
  }

  public function email()
  {
    return $this->belongsTo('David\Email');
  }
}

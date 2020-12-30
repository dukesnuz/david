<?php

namespace David;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use David\User;

class Photocomment extends Model
{
  use SoftDeletes;

  public function photo()
  {
    return $this->belongsTo('David\Photo');
  }
  
}

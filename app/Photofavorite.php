<?php

namespace David;

use Illuminate\Database\Eloquent\Model;

class Photofavorite extends Model
{
  use SoftDeletes;

  public function user()
  {
    return $this->belongsTo('David\User');
  }
}

<?php

namespace David;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function urls()
    {
        return $this->belongsToMany('David\Url')->withTimestamps();
    }
}

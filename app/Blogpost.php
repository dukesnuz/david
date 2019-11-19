<?php

namespace David;

use Illuminate\Database\Eloquent\Model;

class Blogpost extends Model
{
    public function category()
    {
        return $this->belongsTo('David\Category');
    }

    public function blogtags()
    {
        return $this->belongsToMany('David\Blogtag')->withTimeStamps();
    }
}

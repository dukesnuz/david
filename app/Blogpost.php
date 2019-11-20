<?php

namespace David;

use Illuminate\Database\Eloquent\Model;

class Blogpost extends Model
{
    public function Blogcategory()
    {
        return $this->belongsTo('David\Blogcategory');
    }

    public function blogtags()
    {
        return $this->belongsToMany('David\Blogtag')->withTimeStamps();
    }
}

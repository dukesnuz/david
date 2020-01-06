<?php

namespace David;

use Illuminate\Database\Eloquent\Model;

class Blogcategory extends Model
{
    public function Blogpost()
    {
        return $this->hasMany('David\Blogpost');
    }
}

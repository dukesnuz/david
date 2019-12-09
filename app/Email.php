<?php

namespace David;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    public function blogcomments()
    {
        return $this->hasMany('David\Blogcomment');
    }
}

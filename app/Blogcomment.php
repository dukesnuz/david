<?php

namespace David;

use Illuminate\Database\Eloquent\Model;

class Blogcomment extends Model
{
    public function blogpost()
    {
        return $this->belongsTo('David\Blogpost');
    }

    public function email()
    {
        return $this->belongsTo('David\Email');
    }
}

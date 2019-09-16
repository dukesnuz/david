<?php

namespace David;

use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    public function category()
    {
        # Book belongs to Author
        # Define an inverse one-to-many relationship.
        return $this->belongsTo('David\Category');
    }
}

<?php

namespace David;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function urls()
    {
        # Define a one-to-many relationship.
        return $this->hasMany('David\Url');
    }
}

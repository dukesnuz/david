<?php

namespace David;

use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    public function category()
    {
        # Define an inverse one-to-many relationship.
        return $this->belongsTo('David\Category');
    }

    public function tags()
    {
        # With timetsamps() will ensure the pivot table has its created_at/updated_at fields automatically maintained
        return $this->belongsToMany('David\Tag')->withTimestamps();
    }
}

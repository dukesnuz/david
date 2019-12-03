<?php

namespace David;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blogpost extends Model
{
    use SoftDeletes;

    public function Blogcategorys()
    {
        return $this->belongsTo('David\Blogcategory');
    }

    public function blogtags()
    {
        return $this->belongsToMany('David\Blogtag')->withTimeStamps();
    }

    // get slug
    public function getSlugAttribute(): string
    {
        return str_slug($this->subject);
    }

    // create a computed url
    public function getUrlAttribute(): string
    {
        return action('BlogController@blogPost', [$this->id, $this->slug]);
    }
}

<?php

namespace David;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blogpost extends Model
{
    use SoftDeletes;

    public function Blogcategory()
    {
        return $this->belongsTo('David\Blogcategory');
    }

    public function blogtags()
    {
        return $this->belongsToMany('David\Blogtag')->withTimeStamps();
    }

    public function blogcomments()
    {
        return $this->hasMany('David\Blogcomments');
    }

    // get slug
    public function getSlugAttribute(): string
    {
        return str_slug($this->url_friendly, "-");
    }

    // create a computed url
    public function getUrlAttribute(): string
    {
        $category = Blogcategory::findOrFail($this->blogcategory_id);
        $cat = $category->categorys;
        return action('BlogController@blogPost', [$this->id, $cat, $this->slug]);
    }
}

<?php

namespace David;

use Illuminate\Database\Eloquent\Model;

class Blogtag extends Model
{
    public function blogposts()
    {
        return $this->belongsToMany('David\Blogpost')->withTimestamps();
    }

    public static function getBlogTagsForCheckBoxes()
    {
        $blogTags = Blogtag::orderBy('name', 'ASC')->get();
        $blogTagsForCheckBoxes = [];
        foreach ($blogTags as $tag) {
            $blogTagsForCheckBoxes[$tag['id']] = $tag->name;
        }
        return $blogTagsForCheckBoxes;
    }
}

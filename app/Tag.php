<?php

namespace David;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function urls()
    {
        return $this->belongsToMany('David\Url')->withTimestamps();
    }

    public static function getTagsForCheckBoxes()
    {
        $tags = Tag::orderBy('name', 'ASC')->get();
        $tagsForCheckBoxes = [];
        foreach ($tags as $tag) {
            $tagsForCheckBoxes[$tag['id']] = $tag->name;
        }
        return $tagsForCheckBoxes;
    }
}

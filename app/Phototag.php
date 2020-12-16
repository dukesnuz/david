<?php

namespace David;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Phototag extends Model
{
  use SoftDeletes;

  public function photos() {
    return $this->belongsToMany('David\Photo')->withTimestamps();
  }

  public static function getPhotoTagsForCheckBoxes()
  {
    $photoTags = Phototag::orderBy('name', 'ASC')->get();
    $photoTagsForCheckBoxes = [];
    foreach ($photoTags as $tag) {
      $photoTagsForCheckBoxes[$tag['id']] = $tag->name;
    }
    return $photoTagsForCheckBoxes;
  }
}

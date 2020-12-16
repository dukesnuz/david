<?php

namespace David;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Photo extends Model
{
  use SoftDeletes;

  public function Photocategorys()
  {
      return $this->belongsTo('David\Photocategorys');
  }

  public function phototags()
  {
      return $this->belongsToMany('David\Phototag')->withTimeStamps();
  }

  public function photocomments()
  {
      return $this->hasMany('David\Photocomments');
  }

  // get slug
  public function getSlugAttribute(): string
  {
      return str_slug($this->url_friendly, "-");
  }

  // create a computed url
  public function getUrlAttribute(): string
  {
      $category = Photocategory::findOrFail($this->category_id);
      $cat = $category->categorys;
      return action('PhotoController@photo', [$this->id, $cat, $this->slug]);
  }
}

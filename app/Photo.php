<?php

namespace David;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Photo extends Model
{
  use SoftDeletes;

  /* Fillable */
  protected $fillable = [
    'title', 'path', 'caption', 'category_id', 'meta_description', 'url_friendly', 'auth_by', 'is_live', 'ip', 'size'
  ];

  public static function boot()
  {
    parent::boot();
    static::creating(function ($album) {
      $album->auth_by =  1; // auth()->user()->id;
    });
  }

  public function Photocategorys()
  {
    return $this->belongsTo('David\Photocategory');
  }

  public function phototags()
  {
    return $this->belongsToMany('David\Phototag')->withTimeStamps();
  }

  public function photocomments()
  {
    return $this->hasMany('David\Photocomment');
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

  // return category for this photo
  public static function getCategory($id): string
  {
    $cat_id = Photo::findorFail($id);
    $category = Photocategory::findOrFail($cat_id->category_id);
    return $category['categorys'];
  }

}

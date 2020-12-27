<?php

namespace David;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Photofavorite extends Model
{
  use SoftDeletes;

  //show favorites for logged in user
  public static function showUserFavorites($id)
  {

    $favorites = \DB::select( \DB::raw("
    SELECT *
    FROM Photofavorites
    INNER JOIN Photos ON Photos.id = Photofavorites.photo_id
    WHERE
    Photos.is_live = 1
    And
    Photofavorites.user_id = '$id'
    And
    Photofavorites.is_live = 1
    ORDER BY Photos.id DESC
    ") );

    foreach ($favorites as $key => $v) {
      $v->path = 'storage/'.$v->path;

    }
    return $favorites;
  }

}

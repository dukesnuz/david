<?php

namespace David;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
  /* @array $appends */
  public $appends = ['url', 'uploaded_time', 'size_in_kb'];

  public function getUrlAttribute()
  {
    return Storage::disk('local')->url($this->path);
  }
  public function getUploadedTimeAttribute()
  {
    return $this->created_at->diffForHumans();
  }
  function user()
  {
    return $this->belongsTo(User::class, 'auth_by');
  }
  public function getSizeInKbAttribute()
  {
    return round($this->size / 1024, 2);
  }

}

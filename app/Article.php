<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
      'title',
      'subtitle',
      'author',
      'category',
      'content'
    ];

    public function users(){
      return $this->belongsTo(User::class,'author');
    }
}

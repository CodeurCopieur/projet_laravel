<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function caterogy() {
        return $this->belongsTo(Category::class);
    }

    public function picture() {
        return $this->hasOne(Picture::class);
    }
}

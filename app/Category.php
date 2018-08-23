<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

// lien avec la table categories MySQL <=> Category pour bien cabler les deux 
class Category extends Model
{
    public function post() {
        return $this->hasMany(Post::class);
    }
}

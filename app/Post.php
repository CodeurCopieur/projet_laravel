<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Post extends Model
{
    public function category() {
        return $this->belongsTo(Category::class);
    }
    public function picture() {
        return $this->hasOne(Picture::class);
    }


    public function getDateDebut($value){

        return Carbon::parse($value)->format('d/m/Y');
    }

    public function scopeOrderByDate($query){
        $dateActuelle = Carbon::now();

        return $query->where('date_debut', '>', $dateActuelle)->orderBy('date_debut', 'ASC');
    }
}

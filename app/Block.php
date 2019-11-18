<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Block extends Model
{

     //1 block มีการจองได้ 1 ครั้ง
     public function book() {
        return $this->belongsTo(Book::class);
    }
}

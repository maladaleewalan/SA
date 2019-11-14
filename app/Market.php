<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Market extends Model
{
     //ตลาด 1 ตลาดมีการจองได้หลายการจอง
     public function books() {
        return $this->hasMany(Book::class);
    }
    
}

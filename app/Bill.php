<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    //1การโอน มีได้ 1 การจอง
    public function book() {
        return $this->belongsTo(Book::class);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    //1 zone จองได้หลายครั้ง
    public function books() {
        return $this->hasMany(Book::class);
    }
}

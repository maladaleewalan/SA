<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    //1 zone จองได้หลายblock
    public function blocks() {
        return $this->hasMany(Block::class);
    }
}

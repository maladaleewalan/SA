<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    //1 การจองมี user ได้ 1 user
    public function user() {
        return $this->belongsTo(User::class);
    }

    //1 การจอง จองตลาด ได้ 1 ตลาด
    public function market() {
        return $this->belongsTo(Market::class);
    }

    //1 การจอง จองได้ 1 block
    public function blocks() {
        return $this->belongsTo(Block::class);
    }

    //1 การจอง จองได้zoneเดียว
    public function zone() {
        return $this->belongsTo(Block::class);
    }

    //1การจอง โอนเงินได้ ครั้งเดียว
    public function bill() {
        return $this-belongTo(Bill::class);
    }
}

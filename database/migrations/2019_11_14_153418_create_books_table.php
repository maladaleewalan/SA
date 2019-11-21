<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('bookingdate')->nullable();
            $table->enum('selltype', ['อาหาร', 'เสื้อผ้า','ของใช้'])->default('อาหาร');
            $table->Integer('amountblock')->default(0);   //จำนวนblockที่จอง
            $table->bigInteger('pay')->default(0);   //ราคาที่ต้องจ่าย
            $table->enum('status', ['0', '1','2'])->default('0');


            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}

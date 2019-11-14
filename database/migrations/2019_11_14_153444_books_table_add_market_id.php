<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BooksTableAddMarketId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('books', function (Blueprint $table) {
            $table->unsignedBigInteger('market_id')->after('id')->default(1);
            $table->foreign('market_id')->references('id')->on('markets')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();

        Schema::table('books', function (Blueprint $table) {
            $table->dropForeign(['market_id']);
            $table->dropColumn(['market_id']);
        });

        Schema::enableForeignKeyConstraints();
    }
}

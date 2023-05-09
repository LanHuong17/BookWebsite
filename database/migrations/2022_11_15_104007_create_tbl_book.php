<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_book', function($table)
        {
            $table->increments('IDbook');
            $table->integer('category_id')->unsigned();
            $table->integer('IDauthor')->unsigned();

            $table->string('bookname')->default('');
            $table->mediumText('small_descript')->nullable();
            $table->longText('descript')->nullable();
            $table->string('img')->nullable();
            $table->tinyInteger('trending')->default('0')->comment('1=trending,0=not-trending');
            $table->tinyInteger('status')->default('0')->comment('1=hidden,0=visible');
            $table->timestamps();

        });

        Schema::table('tbl_book', function($table)
        {

            $table->foreign('category_id')
                ->references('id')->on('categories')
                ->onDelete('cascade');
            $table->foreign('IDauthor')
                ->references('IDauthor')->on('tbl_author')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_book');
    }
};

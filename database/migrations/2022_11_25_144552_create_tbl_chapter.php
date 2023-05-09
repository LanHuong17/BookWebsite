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
        Schema::create('tbl_chapter', function (Blueprint $table) {
            $table->integer('IDchap')->unsigned();
            $table->integer('IDbook')->unsigned();
            $table->primary(['IDchap', 'IDbook']);
            $table->string('chapname')->default('');
            $table->longText('content')->nullable();
            $table->string('img')->nullable();
            $table->tinyInteger('status')->default('0')->comment('1=hidden,0=visible');
            $table->timestamps();
        });

        Schema::table('tbl_chapter', function($table)
        {
            $table->foreign('IDbook')
                ->references('IDbook')->on('tbl_book')
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
        Schema::dropIfExists('tbl_chapter');
    }
};

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_form');
            $table->integer('jumlah_field')->length(10);
            $table->unsignedInteger('bidang_id')->nullable();

        });
        Schema::create('form_field', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('form_id')->nullable();
            $table->text('nama_field')->length(100000);
            $table->text('contoh_jawaban')->length(100000);
        });
        Schema::create('form_jawaban', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('form_id')->nullable();
            $table->integer('jumlah_data')->length(10);
            $table->text('jawaban_field')->length(100000);
        });

        Schema::table('form', function(Blueprint $table){
            $table->foreign('bidang_id')
                  ->references('id')
                  ->on('bidang')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
        });
        Schema::table('form_field', function(Blueprint $table){
            $table->foreign('form_id')
                  ->references('id')
                  ->on('form')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
        });
        Schema::table('form_jawaban', function(Blueprint $table){
            $table->foreign('form_id')
                  ->references('id')
                  ->on('form')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('form_jawaban');
        Schema::dropIfExists('form_field');
        Schema::dropIfExists('form');
    }
}

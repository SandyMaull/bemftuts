<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('bidang', function (Blueprint $table) {
        //     $table->Increments('id');
        //     $table->string('bidang');   
        // });

        // Schema::create('users', function (Blueprint $table) {
        //     $table->Increments('id');
        //     $table->unsignedInteger('bidang_id')->nullable();
        //     $table->unsignedInteger('prodi_id')->nullable();
        //     $table->string('role');
        //     $table->string('name');
        //     $table->string('email')->unique();
        //     $table->timestamp('email_verified_at')->nullable();
        //     $table->string('password');
        //     $table->string('nim')->length(13)->unique();   
        //     $table->string('angkatan')->length(4);
        //     $table->string('no_telp')->nullable();
        //     $table->string('alamat')->nullable();
        //     $table->string('avatar')->nullable();
        //     $table->rememberToken();
        //     $table->timestamps();
        // });
        // Schema::table('users', function(Blueprint $table){
        //     $table->foreign('bidang_id')
        //           ->references('id')
        //           ->on('bidang')
        //           ->onDelete('cascade')
        //           ->onUpdate('cascade');

        //     $table->foreign('prodi_id')
        //             ->references('id')
        //             ->on('prodi')
        //             ->onDelete('cascade')
        //             ->onUpdate('cascade');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('bidang');
        // Schema::dropIfExists('users');
    }
}

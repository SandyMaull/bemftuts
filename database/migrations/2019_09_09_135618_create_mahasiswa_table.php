<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMahasiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prodi', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('nama_prodi')->length(191);   
        });

        Schema::create('aspirasi', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('nama')->length(191);   
            $table->string('aspirasi')->length(3000);  
            $table->timestamps();
        });

        Schema::create('bidang', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('bidang')->length(191);   
        });

        Schema::create('roles', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('roles')->length(15);   
        });

        Schema::create('users', function (Blueprint $table) {
            $table->Increments('id');
            $table->unsignedInteger('bidang_id')->nullable();
            $table->unsignedInteger('prodi_id')->nullable();
            $table->unsignedInteger('role_id')->nullable();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('nim')->length(13)->unique();   
            $table->string('angkatan')->length(4);
            $table->string('no_telp')->nullable();
            $table->string('alamat')->nullable();
            $table->string('avatar')->nullable();
            $table->string('created_by')->length(255)->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->Increments('id');
            $table->unsignedInteger('prodi_id')->nullable();
            $table->string('nama');
            $table->string('nim')->length(13)->unique();
            $table->string('no_telp')->length(20);    
            $table->string('angkatan')->length(4);
            $table->string('email')->nullable();
            $table->string('alamat')->length(255);
            $table->tinyInteger('telegram')->length(1);
            $table->unsignedInteger('edit_by')->nullable();
            $table->timestamps();
        });
        Schema::create('posts', function (Blueprint $table){
            $table->increments('id');
            $table->string('title')->length(255);
            $table->string('body')->length(3000);
            $table->string('gambar')->length(255);
            $table->unsignedInteger('user_id')->nullable();
            $table->unsignedInteger('bidang_id')->nullable();
            $table->timestamps();
        });
        Schema::table('mahasiswa', function(Blueprint $table){
            $table->foreign('prodi_id')
                  ->references('id')
                  ->on('prodi')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

            $table->foreign('edit_by')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
        });

        Schema::table('users', function(Blueprint $table){
            $table->foreign('bidang_id')
                  ->references('id')
                  ->on('bidang')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

            $table->foreign('prodi_id')
                    ->references('id')
                    ->on('prodi')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

            $table->foreign('role_id')
                    ->references('id')
                    ->on('roles')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
        });
        Schema::table('posts', function(Blueprint $table){
            $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->foreign('bidang_id')
                    ->references('id')
                    ->on('bidang')
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
        
        // Schema::table('mahasiswa', function($table)
        // {
        //     $table->dropForeign('mahasiswa_prodi_id_foreign');
        //     $table->dropForeign('mahasiswa_edit_by_foreign');
        //     $table->dropColumn('prodi_id');
        //     $table->dropColumn('edit_by');
        //     Schema::drop('mahasiswa');
        // });
        // Schema::table('users', function($table)
        // {
        //     $table->dropForeign('users_bidang_id_foreign');
        //     $table->dropForeign('users_prodi_id_foreign');
        //     $table->dropForeign('users_role_id_foreign');
        //     $table->dropColumn('bidang_id');
        //     $table->dropColumn('prodi_id');
        //     $table->dropColumn('role_id');
        //     Schema::drop('users');
        // });
        
        Schema::dropIfExists('mahasiswa');
        Schema::dropIfExists('posts');
        Schema::dropIfExists('users');
        Schema::dropIfExists('prodi');
        Schema::dropIfExists('bidang');
        Schema::dropIfExists('roles');
        Schema::dropIfExists('aspirasi');
    }
}

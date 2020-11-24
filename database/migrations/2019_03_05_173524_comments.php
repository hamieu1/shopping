<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Comments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Comments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_users')->unsigned()->nullable();
            $table->integer('id_KhachHang')->unsigned()->nullable();
            $table->integer('id_SanPham')->unsigned();
            $table->text('NoiDung');
            $table->foreign('id_users')->references('id')->on('users');
            $table->foreign('id_KhachHang')->references('id')->on('KhachHang');
            $table->foreign('id_SanPham')->references('id')->on('SanPham');
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
        Schema::drop('Comments');
    }
}

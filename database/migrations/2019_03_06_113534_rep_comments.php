<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RepComments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('RepComments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_User')->unsigned()->nullable();
            $table->integer('id_KhachHang')->unsigned()->nullable();
            $table->integer('id_Comments')->unsigned();
            $table->text('NoiDung');
            $table->foreign('id_User')->references('id')->on('users');
            $table->foreign('id_KhachHang')->references('id')->on('khachhang');
            $table->foreign('id_Comments')->references('id')->on('Comments');
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
        Schema::drop('RepComments');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LoaiSanPham extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('LoaiSanPham', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Name');
            $table->string('TenKhongDau');
            $table->integer('id_DanhMuc')->unsigned();
            $table->foreign('id_DanhMuc')->references('id')->on('DanhMuc');
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
        Schema::drop('LoaiSanPham');
    }
}

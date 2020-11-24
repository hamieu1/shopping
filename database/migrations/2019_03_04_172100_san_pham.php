<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SanPham extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('SanPham', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Name');
            $table->string('TenKhongDau');
            $table->text('MoTa');
            $table->double('GiaBan');
            $table->double('GiaNhap');
            $table->double('GiaKhuyenMai');
            $table->string('AnhChinh');
            $table->string('AnhPhu1');
            $table->string('AnhPhu2');
            $table->string('AnhPhu3');
            $table->string('AnhPhu4');
            $table->string('TinhTrang');
            $table->integer('SoLuongDaBan')->default(0);
            $table->integer('id_LoaiSanPham')->unsigned();
            $table->foreign('id_LoaiSanPham')->references('id')->on('LoaiSanPham');
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
        Schema::drop('SanPham');
    }
}

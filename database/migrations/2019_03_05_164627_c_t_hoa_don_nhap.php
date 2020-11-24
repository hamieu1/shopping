<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CTHoaDonNhap extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('CTHoaDonNhap', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('SoLuong');
            $table->double('DonGia');
            $table->integer('id_HoaDonNhap')->unsigned();
            $table->foreign('id_HoaDonNhap')->references('id')->on('HoaDonNhap');
            $table->integer('id_SanPham')->unsigned();
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
        Schema::drop('CTHoaDonNhap');
    }
}

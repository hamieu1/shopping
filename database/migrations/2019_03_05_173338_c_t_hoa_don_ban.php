<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CTHoaDonBan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('CTHoaDonBan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('SoLuong');
            $table->double('DonGia');
            $table->integer('id_HoaDonBan')->unsigned();
            $table->foreign('id_HoaDonBan')->references('id')->on('HoaDonBan');
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
        Schema::drop('CTHoaDonBan');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class HoaDonBan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('HoaDonBan', function (Blueprint $table) {
            $table->increments('id');
            $table->double('TongTien');
            $table->integer('id_KhachHang')->unsigned();
            $table->foreign('id_KhachHang')->references('id')->on('KhachHang');
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
        Schema::drop('HoaDonBan');
    }
}

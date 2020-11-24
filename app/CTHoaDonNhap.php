<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CTHoaDonNhap extends Model
{
    protected $table = "cthoadonnhap";

    public function cthoadonnhap_hoadonnhap(){
    	return $this->belongsTo('App\HoaDonNhap', 'id_HoaDonNhap', 'id');
    }

    public function cthoadonnhap_sanpham(){
    	return $this->belongsTo('App\SanPham', 'id_SanPham', 'id');
    }
}

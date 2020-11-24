<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CTHoaDonBan extends Model
{
    protected $table = "cthoadonban";

    public function cthoadonban_sanpham(){
    	return $this->belongsTo('App\SanPham', 'id_SanPham', 'id');
    }

    public function cthoadonban_hoadonban(){
    	return $this->belongsTo('App\HoaDonBan', 'id_HoaDonBan', 'id');
    }
}

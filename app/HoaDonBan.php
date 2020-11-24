<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HoaDonBan extends Model
{
    protected $table = "hoadonban";

    public function hoadonban_khachhang(){
    	return $this->belongsTo('App\KhachHang', 'id_KhachHang', 'id');
    }

    public function hoadonban_cthoadonban(){
    	return $this->hasMany('App\CTHoaDonBan', 'id_HoaDonBan', 'id');
    }

    public function hoadonban_users(){
    	return $this->belongsTo('App\User', 'id_Users', 'id');
    }
}

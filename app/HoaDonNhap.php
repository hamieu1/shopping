<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HoaDonNhap extends Model
{
    protected $table = "hoadonnhap";

    public function hoadonnhap_cthoadonnhap(){
    	return $this->hasMany('App\CTHoaDonNhap', 'id_HoaDonNhap', 'id');
    }

    public function hoadonnhap_users(){
    	return $this->belongsTo('App\User', 'id_users', 'id');
    }
}

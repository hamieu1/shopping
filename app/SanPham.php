<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    protected $table = "sanpham";

    public function sanpham_loaisanpham(){
    	return $this->belongsTo('App\LoaiSanPham', 'id_LoaiSanPham', 'id');
    }

    public function sanpham_comments(){
    	return $this->hasMany('App\Comments', 'id_SanPham', 'id');
    }

    public function sanpham_cthoadonban(){
    	return $this->hasMany('App\CTHoaDonBan', 'id_SanPham', 'id');
    }

    public function sanpham_cthoadonnhap(){
    	return $this->hasMany('App\CTHoaDonNhap', 'id_SanPham', 'id');
    }

    public function sanpham_danhgia(){
    	return $this->hasMany('App\DanhGia', 'id_SanPham', 'id');
    }
}

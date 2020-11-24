<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoaiSanPham extends Model
{
    protected $table = "loaisanpham";

    public function loaisanpham_sanpham(){
    	return $this->hasMany('App\SanPham', 'id_LoaiSanPham', 'id');
    }

    public function loaisanpham_danhmuc(){
    	return $this->belongsTo('App\DanhMuc', 'id_DanhMuc', 'id');
    }
}

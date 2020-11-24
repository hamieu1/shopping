<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DanhMuc extends Model
{
    protected $table = "danhmuc";

    public function danhmuc_loaisanpham(){
    	return $this->hasMany('App\LoaiSanPham', 'id_DanhMuc', 'id');
    }

    public function danhmuc_sanpham(){
    	return $this->hasManyThrough('App\SanPham', 'App\LoaiSanPham', 'id_DanhMuc', 'id_LoaiSanPham', 'id');
    }

    public function danhmuc_sanpham2(){
    	return $this->hasManyThrough('App\SanPham', 'App\LoaiSanPham', 'id_DanhMuc', 'id_LoaiSanPham', 'id')->paginate(16);
    }
}

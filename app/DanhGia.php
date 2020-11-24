<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DanhGia extends Model
{
    protected $table = "danhgia";

    public function danhgia_sanpham(){
    	return $this->belongsTo('App\SanPham', 'id_SanPham', 'id');
    }
}

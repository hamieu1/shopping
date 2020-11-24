<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KhachHang extends Model
{
    protected $table = "khachhang";

    public function khachhang_comments(){
    	return $this->hasMany('App\Comments', 'id_KhachHang', 'id');
    }

    public function khachhang_repcomments(){
    	return $this->hasMany('App\RepComments', 'id_KhachHang', 'id');
    }

    public function khachhang_hoadonban(){
    	return $this->hasMany('App\HoaDonBan', 'id_KhachHang', 'id');
    }
}

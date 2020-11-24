<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $table = "comments";

    public function comments_sanpham(){
    	return $this->belongsTo('App\SanPham', 'id_SanPham', 'id');
    }

    public function comments_users(){
    	return $this->belongsTo('App\User', 'id_users', 'id');
    }

    public function comments_khachhang(){
    	return $this->belongsTo('App\KhachHang', 'id_KhachHang', 'id');
    }

    public function comments_repcomments(){
    	return $this->hasMany('App\Repcomments', 'id_Comments', 'id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RepComments extends Model
{
    protected $table = "repcomments";

    public function repcomments_comments(){
    	return $this->belongsTo('App\Comments', 'id_Comments', 'id');
    }

    public function repcomments_khachhang(){
    	return $this->belongsTo('App\KhachHang', 'id_KhachHang', 'id');
    }

    public function repcomments_users(){
    	return $this->belongsTo('App\User', 'id_User', 'id');
    }
}

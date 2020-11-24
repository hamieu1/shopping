<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LoaiSanPham;

class AjaxController extends Controller
{
    public function getLoaiSanPham($id){
    	$loaisanpham = LoaiSanPham::where('id_DanhMuc', $id)->get();
    	foreach ($loaisanpham as $cate) {
    		echo "<option value='".$cate->id."'>".$cate->Name."</option>";
    	}
    }
}

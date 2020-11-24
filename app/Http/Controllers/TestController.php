<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\SanPham;
use App\DanhMuc;
use DB;

class TestController extends Controller
{
    public function getDanhSach(){
    	$danhmuc = DanhMuc::paginate(1);
    	return view('Admin.Test.danhsach', ['danhmuc' => $danhmuc]);
    }

    public function fetch_data(Request $request){
    	if($request->ajax()){
    		$data = DanhMuc::paginate(1);
    		return view('Admin.Test.pagination_data', ['data' => $data]);
    	}
    }

    public function postThemAjax(Request $request){
    	$danhmuc = new DanhMuc;
    	$danhmuc->Name = $request->name;
    	$danhmuc->save();
    	$data = Danhmuc::orderBy('id', 'desc')->paginate(1);
    	return view('Admin.Test.them_ajax', ['data' => $data]);
    }
}

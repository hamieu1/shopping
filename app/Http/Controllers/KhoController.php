<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kho;

class KhoController extends Controller
{
    public function getDanhSach(){
    	$kho = Kho::all();
    	return view('Admin.Kho.danhsach',['kho' => $kho]);
    }
}

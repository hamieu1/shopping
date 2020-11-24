<?php

use Illuminate\Database\Seeder;

class SanPhamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [[
        	'Name'=>'Đầm ôm vai đính ngọc hàng thiết kế màu kem', 
        	'TenKhongDau' => str_slug('Đầm ôm vai đính ngọc hàng thiết kế màu kem'), 
        	'MoTa' => '﻿Màu sắc: Kem', 
        	'GiaBan' => 120000, 
        	'GiaNhap' => 50000, 
        	'GiaKhuyenMai' => 100000, 
        	'AnhChinh' => 'chuaco', 
        	'AnhPhu1' => 'chuaco', 
        	'AnhPhu2' => 'chuaco', 
        	'AnhPhu3' => 'chuaco', 
        	'AnhPhu4' => 'chuaco', 
        	'TinhTrang' => 'còn hàng',
        	'id_LoaiSanPham' => 4], 
        [
        	'Name' => 'Áo thun nam màu cam in hình độc đáo', 
        	'TenKhongDau' => str_slug('Áo thun nam màu cam in hình độc đáo'), 
        	'MoTa' => '﻿Màu sắc: Cam', 
        	'GiaBan' => 150000, 
        	'GiaNhap' => 70000, 
        	'GiaKhuyenMai' => 120000, 
        	'AnhChinh' => 'chuaco', 
        	'AnhPhu1' => 'chuaco', 
        	'AnhPhu2' => 'chuaco', 
        	'AnhPhu3' => 'chuaco', 
        	'AnhPhu4' => 'chuaco', 
        	'TinhTrang' => 'còn hàng',
        	'id_LoaiSanPham' => 6], 
        [
        	'Name' => 'Áo sơ mi phối ren ray bèo dễ thương', 
        	'TenKhongDau' => str_slug('Áo sơ mi phối ren ray bèo dễ thương'), 
        	'MoTa' => '﻿﻿ Màu sắc: Trắng', 
        	'GiaBan' => 250000, 
        	'GiaNhap' => 150000, 
        	'GiaKhuyenMai' => 200000, 
        	'AnhChinh' => 'chuaco', 
        	'AnhPhu1' => 'chuaco', 
        	'AnhPhu2' => 'chuaco', 
        	'AnhPhu3' => 'chuaco', 
        	'AnhPhu4' => 'chuaco', 
        	'TinhTrang' => 'còn hàng',
        	'id_DanhMuc' => 5]];
        DB::table('SanPham')->insert($data);
    }
}

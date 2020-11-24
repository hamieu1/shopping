<?php

use Illuminate\Database\Seeder;

class LoaiSanPhamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [['Name'=>'Đầm Váy Nữ', 'TenKhongDau' => str_slug('Đầm Váy Nữ'), 'id_DanhMuc' => 2], ['Name' => 'Áo nữ', 'TenKhongDau' => str_slug('Áo nữ'), 'id_DanhMuc' => 2], ['Name' => 'Áo Thun Nam', 'TenKhongDau' => str_slug('Áo Thun Nam'), 'id_DanhMuc' => 1]];
        DB::table('LoaiSanPham')->insert($data);
    }
}

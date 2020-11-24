<?php

use Illuminate\Database\Seeder;

class KhachHangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [['Name' => 'Đoàn Đắc Tuấn', 'Email' => 'doantuan123@gmail.com', 'DiaChi' => 'Bắc Ninh', 'DienThoai' => '0868928495'], ['Name' => 'Phạm Đức Quý', 'Email' => 'phamquycntta@gmail.com', 'DiaChi' => 'Nam Định', 'DienThoai' => '9874587915'], ['Name' => 'Phạm Sơn Hà', 'Email' => 'phamha1996@gmail.com', 'DiaChi' => 'Ninh Bình', 'DienThoai' => '666666666']];
        DB::table('KhachHang')->insert($data);
    }
}

<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [['name' => 'Đào Minh Hà', 'email' => 'hamieu1@gmail.com', 'password' => bcrypt('hamieu'), 'level' => 1, 'dienthoai' => '0868928495', 'hinhanh' => '6669_198351323649104_34410960_n.jpg']];
        DB::table('users')->insert($data);
    }
}

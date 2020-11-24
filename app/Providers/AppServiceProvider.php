<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\DanhMuc;
use App\LoaiSanPham;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        $danhmucgirl = DanhMuc::find(2);
        $danhmucboy = DanhMuc::find(1);
        $data['thoitrangnu'] = $danhmucgirl->DanhMuc_LoaiSanPham;
        $data['thoitrangnam'] = $danhmucboy->DanhMuc_LoaiSanPham;
        view()->share($data);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

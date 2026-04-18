<?php

namespace App\Providers;

use App\Models\Store;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Cek dulu apakah tabel stores sudah ada
        if (Schema::hasTable('stores')) {
            View::share('store', Store::first());
        }
    }
}
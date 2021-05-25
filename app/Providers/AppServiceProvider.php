<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
// 下記function boot()を動かすためSchema指定
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // herokuのメモリ上限を超えないようにするため
        Schema::defaultStringLength(191);
        // 本番環境(Heroku)でhttpsを強制する
        if (\App::environment('production')) {
            \URL::forceScheme('https');
        }
    }
}

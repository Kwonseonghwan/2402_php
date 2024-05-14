<?php

namespace App\Providers;

use App\Models\BoardName;
use Illuminate\Contracts\View\View;
use Illuminate\Support\ServiceProvider;

class MyViewProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // 모든 뷰에 게시판이름 테이블 정보를 전달하는 처리
        view()->composer('*', function ($view) {
            $result = BoardName::orderBy('type')->get();
            $view->with('globalBoardNameInfo', $result);
        });
    }
}

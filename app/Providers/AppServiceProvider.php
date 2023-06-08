<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Helper\CartHelper;
use App\Models\Post;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::usebootstrap();

        View::composer('*', function ($view) {
            $news = Post::orderByDesc('id')->get()->take(5);
            $view->with(
                [
                    'cart' => new CartHelper(),
                    'news'=>$news
                ]
            );
        });
    }
}

<?php

namespace App\Providers;

use App\Models\AdvCategory;
use App\Models\AdvPost;
use App\Observers\AdvCategoryObserver;
use App\Observers\AdvPostObserver;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

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
        Paginator::defaultView('vendor.pagination.bootstrap-5');

        AdvPost::observe(AdvPostObserver::class);
        AdvCategory::observe(AdvCategoryObserver::class);
    }
}

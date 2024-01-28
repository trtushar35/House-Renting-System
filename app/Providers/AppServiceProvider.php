<?php

namespace App\Providers;

use App\Models\Review;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
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
    
        Paginator::useBootstrap('pagination::bootstrap-4');

        if(Schema::hasTable('reviews'))
        {
            $reviewRatings=Review::all();
            View::share('reviewRatings', $reviewRatings );
        }

        // if(session()->has('locale')){
        //     $current_local=session()->get('locale');
        // }else{
        //     $current_local='en';
        // }

        // View::share('current_local',$current_local);
    }
}

<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Category;
use App\Province;
use App\Slider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $categories = Category::orderBy('nombre')->get();
        $provincias = Province::orderBy('nombre')->get();
        $sliders = Slider::get();

        View::share(['categories' => $categories, 'provincias' => $provincias, 'sliders' => $sliders]);
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

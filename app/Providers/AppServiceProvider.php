<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Category;
use App\General;
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
        $pagina = General::findOrFail(1);

        View::share(['categories' => $categories, 'provincias' => $provincias, 'sliders' => $sliders, 'pagina' => $pagina]);
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

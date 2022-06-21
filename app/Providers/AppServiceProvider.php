<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

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
        Blade::directive('animate_opacity', function ($show) {
            $string =  '<div x-show="' . $show . '" x-transition:enter="transition ease-out duration-500"';
            $string = $string . 'x-transition:enter-start="opacity-0 transform scale-90" x-transition:enter-end="opacity-100 transform scale-100"';
            $string = $string . 'x-transition:leave="transition ease-in duration-500" x-transition:leave-start="opacity-100 transform scale-100"';
            $string = $string . 'x-transition:leave-end="opacity-0 transform scale-90">';
            return $string;
        });

        Blade::directive('endanimate', function () {
            return '</div>';
        });
    }
}

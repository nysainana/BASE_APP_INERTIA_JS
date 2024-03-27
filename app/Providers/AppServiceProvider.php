<?php

namespace App\Providers;

use App\Services\Cpanel\Cpanel;
use Illuminate\Support\Facades\URL;
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
        $this->app->singleton(Cpanel::class,function(){
            return new Cpanel(config("app.whm.user"), config("app.whm.password"), config("app.whm.host"), config("app.whm.port"), false);
            ;
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (config('app.env') === 'production') {
            URL::forceScheme('https');
        }
    }
}

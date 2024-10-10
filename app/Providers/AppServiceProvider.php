<?php

namespace App\Providers;

use App\Models\Passport\Client;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;
use Laravel\Passport\Passport;

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
        Model::unguard();
        Model::preventLazyLoading();

        Request::macro('perPage', function () {
            return max(min($this->query('perPage', 25), 100), 5);
        });

        Passport::useClientModel(Client::class);
    }
}

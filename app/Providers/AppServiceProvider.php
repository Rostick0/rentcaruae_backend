<?php

namespace App\Providers;

use App\Models\Company;
use App\Models\User;
use App\Observers\CompanyObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void {}

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if ($user = User::find(1)) {
            auth()->setUser($user);
        }
        Company::observe(CompanyObserver::class);
    }
}

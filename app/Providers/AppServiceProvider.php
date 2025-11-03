<?php

namespace App\Providers;

use App\Services\AI\AIServiceFactory;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(AIServiceFactory::class, function () {
            return new AIServiceFactory(
                config('services.openAI.key'),
                config('services.gemini.key')
            );
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}

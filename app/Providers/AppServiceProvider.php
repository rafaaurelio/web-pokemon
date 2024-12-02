<?php

namespace App\Providers;

use App\Models\Pokemon;
use App\Models\Treinador;
use App\Policies\PokemonPolicy;
use App\Policies\TreinadorPolicy;
use Illuminate\Support\Facades\Gate;
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
        Gate::policy(Pokemon::class, PokemonPolicy::class);
        Gate::policy(Treinador::class, TreinadorPolicy::class);
    }


}

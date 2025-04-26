<?php

declare(strict_types = 1);

namespace App\Providers;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use Laravel\Pennant\Feature;
use Laravel\Pennant\Middleware\EnsureFeaturesAreActive;
use Override;

final class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    #[Override]
    public function register(): void
    {

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        EnsureFeaturesAreActive::whenInactive(fn () => abort(403));

        Feature::define('price-consultation', fn (User $user): bool => match (true) {
            default => 'fe686827-fecf-4df7-89df-6feb74123f88' === $user->id,
        });

        Feature::define('manager-products', fn (User $user): bool => match (true) {
            default => 'fe686827-fecf-4df7-89df-6feb74123f88' === $user->id,
        });

        Model::preventLazyLoading(!app()->isProduction());
    }
}

<?php

namespace App\Providers;

use App\Models\KpiPeriod;
use Illuminate\Support\Facades\View;
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
    $activePeriod = KpiPeriod::where('status', 'active')->first();

    // Jika tidak ada data aktif, beri nilai default 'kosong'
    $activePeriod = $activePeriod ?? 'kosong';

    // Bagikan data ke semua view
    View::share('activePeriod', $activePeriod);
}
}

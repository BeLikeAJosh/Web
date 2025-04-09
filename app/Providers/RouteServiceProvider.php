<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;

class RouteServiceProvider extends ServiceProvider
{
    public const HOME = '/';

    public function boot(): void
    {
        $this->routes(function () {
            Route::middleware('web')
                ->group(base_path('routes/web.php'));

            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));
        });
    }

    public static function redirectTo(): string
    {
        $user = Auth::user();

        if (!$user) {
            return '/login';
        }

        return match ($user->role) {
            'Mahasiswa' => '/mahasiswa/dashboard',
            'Kaprodi' => '/kaprodi/dashboard',
            'Admin' => '/admin/dashboard',
            'SuperAdmin' => '/superadmin/dashboard',
            default => '/',
        };
    }
}

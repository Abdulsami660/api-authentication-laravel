<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Response;

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
        Response::macro('success', function (?string $message = '', $data = [], int $status = 200) {
            
            $data = [
                'message' => $message,
                'data'    => $data,
                'success' => true
            ];

            return response()->json($data, $status);

        });

        Response::macro('error', function (string $message = '', $data = [], int $status = 500) {
            
            $data = [
                'message' => $message,
                'data'    => $data,
                'success' => false
            ];

            return response()->json($data, $status);

        });
    }
}

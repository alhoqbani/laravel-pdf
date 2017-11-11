<?php

namespace Alhoqbani\Mpdf;

use Illuminate\Support\ServiceProvider;
use Mpdf\Mpdf;

class PDFServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/PDF.php' => config_path('PDF.php'),
            ], 'config');

        }

    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $mpdf = new Mpdf();

        $this->app->bind('PDF', function () use ($mpdf) {
            return new PDF($mpdf);
        });

        $this->mergeConfigFrom(__DIR__ . '/../config/PDF.php', 'PDF');
    }
}

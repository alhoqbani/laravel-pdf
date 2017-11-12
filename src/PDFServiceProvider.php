<?php

namespace Alhoqbani\PDF;

use Alhoqbani\PDF\Contracts\PDF as PDFContract;
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
            ],
                'config');

        }

    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/PDF.php', 'PDF');

        $this->app->bind(Mpdf::class, function () {
        $config = new Config($this->app->get('config')->get('PDF'));

                $mpdf = new Mpdf($config->all());

                $this->setLogger($mpdf);

                return $mpdf;
            });

        $this->app->bind(PDFContract::class, function () {

                $mpdf = $this->app->make(Mpdf::class);

                return new PDF($mpdf);
            });
    }
}

<?php

namespace Alhoqbani\PDF;

use Alhoqbani\PDF\Contracts\PDF as PDFContract;
use Alhoqbani\PDF\Exceptions\PDFException;
use Illuminate\Support\ServiceProvider;
use Monolog\Handler\NullHandler;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
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

                if ($config->has('tempDir')) {
                    $this->setTempDirectory($config->get('tempDir'));
                }

                $mpdf = new Mpdf($config->all());

                if ($config->has('logger')) {
                    $mpdf->setLogger($this->getLogger($config));
                }

                return $mpdf;
            });

        $this->app->bind(PDFContract::class, function () {

                $mpdf = $this->app->make(Mpdf::class);

                return new PDF($mpdf);
            });
    }

    /**
     * Get the logger for Mpdf class
     *
     * @param \Alhoqbani\PDF\Config $config
     *
     * @return \Psr\Log\LoggerInterface
     */
    protected function getLogger(Config $config)
    {
        switch ($config->get('logger')) {
            case 'default':
                return $this->app->log->getMonolog();
            case 'custom':
                $logger = new Logger('pdf');
                $logger->pushHandler(new StreamHandler(storage_path('logs/pdf.log'), Logger::DEBUG));

                return $logger;
            default:
                $logger = new Logger('pdf');
                $logger->pushHandler(new NullHandler());

                return $logger;
        }
    }

    /**
     * Set the temporary directory if present in config
     *
     *
     * @param $tempDir
     *
     * @return void
     * @throws \Alhoqbani\PDF\Exceptions\PDFException
     */
    protected function setTempDirectory($tempDir)
    {
        if ( ! is_dir($tempDir) || ! is_writable($tempDir)) {
            if ( ! @mkdir($tempDir, 0775, true)) {
                $message = sprintf(
                    'Couldn\'t create temprory directory at %s.
                    Create the directory with permission 0775',
                    $tempDir
                );
                throw new PDFException($message);
            }
        }
    }
}

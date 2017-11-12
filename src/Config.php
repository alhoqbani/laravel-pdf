<?php

namespace Alhoqbani\PDF;

use Alhoqbani\PDF\Contracts\Config as ConfigContract;
use Illuminate\Config\Repository;
use Mpdf\Config\ConfigVariables;
use Mpdf\Config\FontVariables;
use Mpdf\Mpdf;

class Config extends Repository implements ConfigContract
{

    public function __construct(array $items = [])
    {
        parent::__construct($items);

        $config = $this->app->get('config')->get('PDF');
        $defaultConfig = (new ConfigVariables())->getDefaults();
        $defaultFontConfig = (new FontVariables())->getDefaults();

        $config = $this->setTempDirectory($config);

        if (isset($config['fontDir'])) {
            $defaultFontDirs = $defaultConfig['fontDir'];
            $fontDirs = $config['fontDir'];
            $config['fontDir'] = array_merge($defaultFontDirs, $fontDirs);
        }

        if (isset($config['fontdata'])) {
            $defaultFontdata = $defaultFontConfig['fontdata'];
            $fontdata = $config['fontdata'];
            $config['fontdata'] = array_merge($defaultFontdata, $fontdata);
        }

        $config = array_merge($defaultConfig, $config);
    }


    /**
     * Set the temporary directory if present in config
     *
     * @param $config
     *
     * @return mixed
     */
    protected function setTempDirectory($config)
    {
        if ($tempDir = $this->app->config->get('PDF.tempDir')) {
            if ( ! $this->app->get('filesystem')->disk('local')->exists($tempDir)) {
                $this->app->get('filesystem')->disk('local')->makeDirectory($tempDir, 775);
            }
            $config['tempDir'] = $this->app->get('filesystem')->disk('local')->path($tempDir);
        }

        return $config;
    }

    /**
     * Set the logger for Mpdf class
     *
     * @param \Mpdf\Mpdf $mpdf
     */
    protected function setLogger(Mpdf $mpdf)
    {
        if ($logging = $this->app->config->get('PDF.logging')) {
            switch ($logging) {
                case 'default':
                    $mpdf->setLogger($this->app->log->getMonolog());

                    return;
                case 'custom':
                    $logger = new Logger('name');
                    $logger->pushHandler(new StreamHandler(storage_path('logs/pdf.log'), Logger::DEBUG));
                    $mpdf->setLogger($logger);

                    return;
                default:
                    return;
            }
        }
    }
}
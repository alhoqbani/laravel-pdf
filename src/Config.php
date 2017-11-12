<?php

namespace Alhoqbani\PDF;

use Alhoqbani\PDF\Contracts\Config as ConfigContract;
use Illuminate\Config\Repository;
use Mpdf\Config\ConfigVariables;
use Mpdf\Config\FontVariables;
use Mpdf\Mpdf;

class Config extends Repository implements ConfigContract
{

    /**
     * Default Mpdf Configurations
     * @var array
     */
    protected $defaultsConfig;

    /**
     * Default Mpdf Font Configurations
     * @var array
     */
    protected $defaultsFontConfig;

    /**
     * Create a new configuration repository.
     *
     * @param  array $items
     *
     */
    public function __construct(array $items = [])
    {
        parent::__construct($items);

        $this->defaultsConfig = (new ConfigVariables())->getDefaults();
        $this->defaultsFontConfig = (new FontVariables())->getDefaults();

        if ($this->has('fontDir')) {
            $defaultFontDirs = $this->defaultsConfig['fontDir'];
//            $fontDirs = $config['fontDir'];
//            $config['fontDir'] = array_merge($defaultFontDirs, $fontDirs);
        }

        if ($this->has('fontdata')) {
            $defaultFontdata = $this->defaultsFontConfig['fontdata'];
//            $fontdata = $config['fontdata'];
//            $config['fontdata'] = array_merge($defaultFontdata, $fontdata);
        }
    }

    /**
     * Get Mpdf Default Config
     *
     * @return array
     */
    public function getDefaultMpdfConfig()
    {
        return $this->defaultsConfig;
    }

    /**
     * Get Mpdf Default Fonts Config
     *
     * @return array
     */
    public function getDefaultFontMpdfConfig()
    {
        return $this->defaultsFontConfig;
    }
}
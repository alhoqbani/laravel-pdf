<?php

namespace Alhoqbani\PDF;

use Alhoqbani\PDF\Contracts\Config as ConfigContract;
use Illuminate\Config\Repository;
use Mpdf\Config\ConfigVariables;
use Mpdf\Config\FontVariables;

class Config extends Repository implements ConfigContract
{

    /**
     * Default Mpdf Configurations
     *
     * @var array
     */
    protected $defaultsConfig;

    /**
     * Default Mpdf Font Configurations
     *
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
        $this->defaultsConfig = (new ConfigVariables())->getDefaults();
        $this->defaultsFontConfig = (new FontVariables())->getDefaults();
        parent::__construct($items);
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


    /**
     * Get all of the configuration items after merging with default Mpdf config.
     *
     * @return array
     */
    public function all()
    {
        $items = $this->items;
        if ($this->has('fontDir')) {
            $items['fontDir'] = array_merge($this->get('fontDir'), $this->defaultsConfig['fontDir']);
        }

        if ($this->has('fontdata')) {
            $items['fontdata'] = array_merge($this->get('fontdata'), $this->defaultsFontConfig['fontdata']);
        }

        return $items;
    }
}
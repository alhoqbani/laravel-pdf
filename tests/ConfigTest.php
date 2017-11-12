<?php

namespace Alhoqbani\PDF\Test;

use Alhoqbani\PDF\Config;
use Mpdf\Config\ConfigVariables;
use Mpdf\Config\FontVariables;

class ConfigTest extends AbstractTestCase
{
    /** @test */
    public function it_sets_the_default_mpdf_configurations()
    {
        $config = new Config($this->configs);
        $defaultsMpdfConfig = (new ConfigVariables())->getDefaults();

        $this->assertEquals($config->getDefaultMpdfConfig(), $defaultsMpdfConfig);
    }

    /** @test */
    public function it_sets_the_default_mpdf_fonts_configurations()
    {
        $config = new Config($this->configs);
        $defaultsMpdfFontsConfig = (new FontVariables())->getDefaults();

        $this->assertEquals($config->getDefaultFontMpdfConfig(), $defaultsMpdfFontsConfig);
    }
}

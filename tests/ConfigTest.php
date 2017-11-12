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
        $config = new Config([]);
        $defaultsMpdfConfig = (new ConfigVariables())->getDefaults();

        $this->assertEquals($config->getDefaultMpdfConfig(), $defaultsMpdfConfig);
    }

    /** @test */
    public function it_sets_the_default_mpdf_fonts_configurations()
    {
        $config = new Config([]);
        $defaultsMpdfFontsConfig = (new FontVariables())->getDefaults();

        $this->assertEquals($config->getDefaultFontMpdfConfig(), $defaultsMpdfFontsConfig);
    }

    /** @test */
    public function it_merges_default_fonts_directory_with_directories_provided_by_published_config()
    {
        $customDirectories = ['/app/pdf/fonts', '/app/fonts'];
        $defaultDirectories = (new ConfigVariables())->getDefaults()['fontDir'];

        $config = new Config(['fontDir' => $customDirectories]);

        $this->assertArraySubset($customDirectories, $config->all()['fontDir']);
        $this->assertEquals(array_merge($customDirectories, $defaultDirectories), $config->all()['fontDir']);
    }

    /** @test */
    public function it_sets_overridden_configurations_from_published_config_file()
    {
        $config = new Config(array_merge(['mirrorMargins' => 'overridden_value']));

        $this->assertEquals('overridden_value', $config->all()['mirrorMargins']);
    }
}
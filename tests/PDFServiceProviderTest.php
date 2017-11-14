<?php

namespace Alhoqbani\PDF;

use Alhoqbani\PDF\Contracts\PDF as PDFContract;
use Mpdf\Mpdf;
use Orchestra\Testbench\TestCase;

class PDFServiceProviderTest extends TestCase
{

    /** @test */
    public function testServiceIsAvailable()
    {
        $this->assertInstanceOf(Mpdf::class, $this->app->make(Mpdf::class));
        $this->assertInstanceOf(PDF::class, $this->app->make(PDFContract::class));
    }

    /** @test */
    public function it_published_merged_config_file()
    {
        $this->assertEquals('A4', \Config::get('PDF.format'));
    }

    /** @test */
    public function it_sets_the_temporary_directory()
    {
        $mpdf = $this->app->make(Mpdf::class);

        $this->assertDirectoryExists($mpdf->tempDir);
    }

    protected function getPackageProviders($app)
    {
        return ['Alhoqbani\PDF\PDFServiceProvider'];
    }
}

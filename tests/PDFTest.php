<?php

namespace Alhoqbani\Mpdf\Test;

use Alhoqbani\PDF\PDF;
use Mockery;
use Mpdf\Mpdf;

class PDFTest extends Mockery\Adapter\Phpunit\MockeryTestCase
{
    /** @test */
    public function it_works()
    {
        $this->assertTrue(true);
    }

    /** @test */
    public function it_passes_methods_to_mpdf_class()
    {
        $mpdf = Mockery::mock(Mpdf::class);
        $mpdf->shouldReceive('WriteHTML')->with('<h1>Hello World</h1>')->atLeast()->once();
        $PDF = new PDF($mpdf);
        $PDF->WriteHTML('<h1>Hello World</h1>');
    }
}

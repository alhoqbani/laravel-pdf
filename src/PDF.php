<?php

namespace Alhoqbani\PDF;

use \Alhoqbani\PDF\Contracts\PDF as PDFContract;
use Mpdf\Mpdf;

class PDF implements PDFContract
{

    /**
     * @var \Mpdf\Mpdf
     */
    private $mpdf;

    /**
     * Create a new Mpdf Instance.
     *
     * @param \Mpdf\Mpdf $mpdf
     */
    public function __construct(Mpdf $mpdf)
    {
        $this->mpdf = $mpdf;
    }

//    public function WriteHTML($html)
//    {
//        $this->mpdf->writeHTML($html);
//    }

    public function __call($name, $arguments)
    {
        $this->mpdf->$name(...$arguments);

        return $this;
    }

}

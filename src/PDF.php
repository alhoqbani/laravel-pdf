<?php

namespace Alhoqbani\Mpdf;

use Mpdf\Mpdf;

class PDF
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

    /**
     * Friendly welcome.
     *
     * @param string $phrase Phrase to return
     * @return string Returns the phrase passed in
     */
    public function echoPhrase($phrase)
    {
        return $phrase;
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

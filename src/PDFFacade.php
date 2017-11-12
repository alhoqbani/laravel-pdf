<?php

namespace Alhoqbani\Mpdf;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Alhoqbani\PDF\PDF
 */
class PDFFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'PDF';
    }
}

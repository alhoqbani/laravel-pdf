<?php

namespace Alhoqbani\PDF\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Alhoqbani\PDF\PDF
 */
class PDF extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return \Alhoqbani\PDF\Contracts\PDF::class;
    }
}

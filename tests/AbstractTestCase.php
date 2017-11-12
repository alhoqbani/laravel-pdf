<?php

namespace Alhoqbani\PDF\Test;

use PHPUnit\Framework\TestCase;

abstract class AbstractTestCase extends TestCase
{

    /**
     * Default published configs
     *
     * @var  array
     * */
    protected $configs;

    protected function setUp()
    {
        parent::setUp();
        $this->configs = include __DIR__ . '/../config/PDF.php';

    }

}

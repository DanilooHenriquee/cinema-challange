<?php

namespace Config;

use Config\Loader;

class Service
{
    protected $load;

    public function __construct()
    {
        $this->load = new Loader($this);
    }

}
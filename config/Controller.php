<?php

namespace Config;

use Config\Loader;

class Controller
{
    protected $load;

    public function __construct()
    {
        $this->load = new Loader($this);
    }

}

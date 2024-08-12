<?php

namespace Config;

use Config\Loader;

class Model
{
    protected $load;

    protected $db;

    public function __construct()
    {
        $this->load = new Loader($this);

        $db = Database::getInstance();
        $this->db = $db->getConnection();
    }

}

<?php

namespace base;


abstract class Model
{
    public $db;

    public function __construct()
    {
        $this->db = new Db;
        $this->db->connect();
    }
}

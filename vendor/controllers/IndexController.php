<?php

namespace controllers;

use View;
use Route;

class IndexController

{
    private $view;

    public function __construct()
    {
        $this->view = new View();
        $this->route = new Route();
    }
    public function index() {
        echo "function";
    }
}
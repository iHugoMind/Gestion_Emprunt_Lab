<?php

namespace Router;
use Database\DBconnection;

class Route {

    public $path;
    public $action;
    public $matches;

    public function __construct($path, $action)
    {
        $this->path = trim($path, '/');
        $this->action = $action;
    }

    public function matches(string $url)
    {
        $path = preg_replace('#:([\w]+)#', '([^/]+)',$this->path);
        $pathToMatch = "#^$path$#";

        if (preg_match($pathToMatch, $url, $matches)) {
            $this->matches =$matches;
            return true;
        } else {
            return false;
        }
    }

    public function execute()
    {
        $params = explode('@', $this->action);
        $controller = new $params[0](new DBconnection('projetbmh_labnum', 'mysql-projetbmh.alwaysdata.net', 'projetbmh', 'Projet45of45&*'));
        $method = $params[1];

        return isset($this->matches[1]) ? $controller->$method($this->matches[1]) : 
        $controller->$method();
    }
}
<?php

namespace App\Controllers;

use Database\DBconnection;

class Controller {

    protected $db;

    public function __construct(DBconnection $db)
    {
        $this->db = $db;
    }

    public function view(string $path, array $params = null)
{
    ob_start();
    $path = str_replace('.', DIRECTORY_SEPARATOR, $path);
    require VIEWS . $path . '.php';
    if ($params) {
        extract($params);
    }
    $content = ob_get_clean();
    require VIEWS . 'layout.php';
}

public function getDB()
{
    return $this->db;
}

}
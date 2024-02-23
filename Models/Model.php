<?php

namespace App\Models;

use Database\DBconnection;

class Model {
    protected $db;
    protected $table;

    public function __construct(DBconnection $db)
    {
        $this->$db;
    }

    public function all(): array
    {
        $stmt = $this->db->getPDO()->query("SELECT * FROM {$this->table}");
        return $stmt->fetchAll();
    }
}
<?php 

namespace App\Models;

class ConnexionSql extends Model {

    protected $table ='Utilisateurs';

    //Methode pour trouver un utilisateur par son email 
    public function getUserByEmail($email)
    {
        $stmt = $this->db->getPDO()->prepare("SELECT * FROM {$this->table} WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch();
    }
}
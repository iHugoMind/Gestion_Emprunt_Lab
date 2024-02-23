<?php

namespace App\Models;

use PDO;

class RegisterSql extends Model {

     protected $table = 'Utilisateurs';

     // Méthode pour vérifier si l'e-mail est déjà utilisé
    public function isEmailTaken($email) {
        $stmt = $this->db->getPDO()->prepare("SELECT COUNT(*) FROM {$this->table} WHERE email = ?");
        $stmt->execute([$email]);
        $count = $stmt->fetchColumn();
        return $count > 0;
    }

    // Méthode pour créer un nouvel utilisateur
    public function createUser($nom, $prenom, $email, $password, $tel, $etablissement) {
        // Hasher le mot de passe avant de l'enregistrer dans la base de données
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Vérifier si l'établissement existe déjà dans la base de données
        $etablissementId = $this->getEtablissementId($etablissement);

        // Si l'établissement n'existe pas, l'ajouter à la base de données et récupérer son ID
        if (!$etablissementId) {
            $etablissementId = $this->insertEtablissement($etablissement);
        }

        // Préparer et exécuter la requête d'insertion
        $stmt = $this->db->getPDO()->prepare("INSERT INTO {$this->table} (nomUtilisateur, prenomUtilisateur, emailUtilisateur, motDePasse, telephoneUtilisateur, idEtablissement ) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([$nom, $prenom, $email, $hashedPassword, $tel, $etablissementId ]);
    }

    // Méthode pour obtenir l'ID de l'établissement s'il existe déjà dans la base de données
    private function getEtablissementId($etablissement) {
        $stmt = $this->db->getPDO()->prepare("SELECT id FROM Etablissements WHERE nomEtablissement = ?");
        $stmt->execute([$etablissement]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ? $result['id'] : null;
    }

    // Méthode pour insérer un nouvel établissement dans la base de données et récupérer son ID
    private function insertEtablissement($etablissement) {
        $stmt = $this->db->getPDO()->prepare("INSERT INTO Etablissement (nomEtablissement) VALUES (?)");
        $stmt->execute([$etablissement]);
        return $this->db->getPDO()->lastInsertId();
    }

}
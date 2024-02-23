<?php

namespace App\Controllers;

use App\Models\ConnexionSQL;
use App\Models\RegisterSql;

session_start();

class ConnexionController extends Controller {


    // Méthode pour afficher le formulaire de connexion
    public function index()
    {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        // Afficher le formulaire
        return $this->view('connexion.index');
    }

    // Méthode pour vérifier la connexion de l'utilisateur
    public function verifyConnection()
    {
        // Récupérer les données du formulaire 
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Instanciation du modèle ConnexionSqls
        $connexionSqls = new ConnexionSQL($this->getDB());

        // Vérifier si les champs sont remplis 
        if (!empty($email) && !empty($password)) {
            // Rechercher l'utilisateur dans la base de données
            $user = $connexionSqls->getUserByEmail($email);
        }

        // Vérifier si l'utilisateur existe et si le mot de passe correspond
        if ($user && password_verify($password, $user->password)) {
            // Rediriger vers la page d'accueil 
            return $this->view('Accueil.index');
        } else {
            // Identifiants incorrects, afficher un message d'erreur
            $error = "Adresse e-mail ou mot de passe incorrect.";
            return $this->view('connexion.index', compact('error'));
        } 
    }

    // Méthode pour traiter l'enregistrement de l'utilisateur
    public function handleRegistration()
    {
        // Récupérer les données du formulaire 
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $tel = $_POST['tel'];
        $etablissement = $_POST['etablissement'];

        // Valider les données
        if (empty($nom) || empty($prenom) || empty($email) || empty($password) || empty($tel) || empty($etablissement)) {
            // Les champs ne sont pas tous remplis, afficher un message d'erreur
            $error = "Veuillez remplir tous les champs.";
            return $this->view('connexion.index', compact('error'));
        }

        // Vérifier le format de l'e-mail
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error = "L'adresse e-mail n'est pas valide.";
            return $this->view('connexion.index', compact('error'));
        }

        // Vérifier la force du mot de passe
        if (strlen($password) < 8 || !preg_match('/[A-Za-z]/', $password) || !preg_match('/\d/', $password)) {
            $error = "Le mot de passe doit contenir au moins 8 caractères avec des chiffres et des lettres.";
            return $this->view('connexion.index', compact('error'));
        }

        // Instanciation du modèle RegisterSql
        $registerSqls = new RegisterSql($this->getDB());

        // Vérifier si l'e-mail est déjà utilisé
        if ($registerSqls->isEmailTaken($email)) {
            // L'e-mail est déjà utilisé, afficher un message d'erreur
            $error = "Cette adresse e-mail est déjà utilisée.";
            return $this->view('connexion.index', compact('error'));
        }

        // Créer un nouvel utilisateur dans la base de données
        $registerSqls->createUser($nom, $prenom, $email, $password, $tel, $etablissement);

        // Rediriger l'utilisateur vers la page de connexion
        return header('Location: /connexion');
    }
}

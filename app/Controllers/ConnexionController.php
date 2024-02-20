<?php

namespace App\Controllers;

class ConnexionController extends Controller {

    public function index()
    {
        return $this->view('connexion.index');
    }

    public function show(int $id)
    {
        return $this->view('connexion.show', compact('id'));
    }

}
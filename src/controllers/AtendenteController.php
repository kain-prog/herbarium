<?php

namespace src\controllers;

use core\Controller;
use core\Request;

class AtendenteController extends Controller
{
    public function index()
    {
        $_SESSION['atendente'] = true;

        if (!isset($_SESSION['atendente']) || empty($_SESSION['atendente'])) {
            return $this->redirect('/');
        }

        $this->render('atendente', [
            'title' => "Herbarium | Painel do Atendente"
        ]);
    }
}
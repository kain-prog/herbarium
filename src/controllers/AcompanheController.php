<?php

namespace src\controllers;

use core\Controller;
use core\Request;

class AcompanheController extends Controller
{
    public function index()
    {
        $this->render('acompanhe', [
            'title' => "Herbarium | Painel do Acompanhe"
        ]);
    }
}
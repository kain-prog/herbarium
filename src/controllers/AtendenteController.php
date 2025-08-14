<?php

namespace src\controllers;

use core\Controller;
use core\Request;
use src\models\Relatos;

class AtendenteController extends Controller
{
    public function index()
    {
        $_SESSION['atendente'] = true;

        if (!isset($_SESSION['atendente']) || empty($_SESSION['atendente'])) {
            return $this->redirect('/');
        }

        $relatos = Relatos::select()->get();

        $relatos_novos = array_filter($relatos, fn($r) => $r['status'] === 'novo');
        $relatos_andamento = array_filter($relatos, fn($r) => $r['status'] === 'em_andamento');
        $relatos_analise = array_filter($relatos, fn($r) => $r['status'] === 'em_analise');
        $relatos_respondidos = array_filter($relatos, fn($r) => $r['status'] === 'respondido');

        $this->render('atendente', [
            'title' => "Herbarium | Painel do Atendente",
            'relatos' => $relatos,
            'relatos_andamento' => $relatos_andamento,
            'relatos_novos' => $relatos_novos,
            'relatos_analise' => $relatos_analise,
            'relatos_respondidos' => $relatos_respondidos
        ]);
    }
}
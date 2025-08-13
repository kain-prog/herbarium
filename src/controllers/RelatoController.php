<?php

namespace src\controllers;

use core\Controller;
use core\Request;

class RelatoController extends Controller
{
    public function index(){

        $request = Request::get('tab');

        $isConsulta = $request && $request === 'consulta';

        $this->render('relato', [
            'title' => 'Herbarium | Canal do Colaborador',
            'isConsulta' => $isConsulta
        ]);
    }
}
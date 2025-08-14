<?php

namespace src\controllers;

use core\Controller;
use core\Request;

class SuccessController extends Controller
{
    public function index(){

        $protocolo = Request::get('protocolo');

        if(empty($protocolo) || !isset($protocolo)) {
           header('Location: /');
           exit;
        }

        $this->render('success', [
            'protocolo' => $protocolo
        ]);
    }
}
<?php

namespace src\controllers;

use core\Controller;
use core\Request;
use src\utils\GerarProtocolo;
use src\models\Relatos;
use src\models\Perguntas;

class RelatoController extends Controller
{
    public function index()
    {

        $request = Request::get('tab');

        $isConsulta = $request && $request === 'consulta';

        $this->render('relato', [
            'title' => 'Herbarium | Canal do Colaborador',
            'isConsulta' => $isConsulta
        ]);
    }

    public function store()
    {
        $data = json_decode(file_get_contents('php://input'), true);

        $relato = new Relatos();

        $created_at = date('Y-m-d H:i:s');
        $protocolo = GerarProtocolo::gerar();

        $dataRelato = array(
            'tipo' => $data['tipo'] ?? '',
            'anonimo' => isset($data['anonimo']) && $data['anonimo'] ? 1 : 0,
            'nome' => $data['nome'] ?? '',
            'protocolo' => $protocolo,
            'created_at' => $created_at
        );

        $id = $relato->insert($dataRelato)->execute();

        $pergunta = new Perguntas();

        $dataPergunta = array(
            'relato_id' => intval($id),
            'texto' => $data['descricao'],
            'created_at' => $created_at
        );

        $pergunta->insert($dataPergunta)->execute();

        header('Content-type: application/json');
        header('accept: application/json');
        echo json_encode(['protocolo' => $protocolo]);
    }
}
<?php

namespace src\controllers;

use core\Controller;
use core\Request;
use src\models\Relatos;
use src\models\Respostas;
use src\models\Perguntas;
use src\utils\FormatarData;

class AcompanheController extends Controller
{
    public function index()
    {
        $isAtendente = isset($_SESSION['atendente']) && !empty($_SESSION['atendente']);

        $protocolo = Request::get('protocolo');
        $relato = Relatos::select()->where('protocolo', $protocolo)->one();

        $mensagens = [];
        $createdAt = null;
        $nome = '';

        if(!$relato){
            header('Location: /');
            exit;
        }

        if($relato['status'] === 'fechado' && !$isAtendente){
            header('Location: /');
            exit;
        }

        if($relato['status'] === 'respondido' && !$isAtendente){
            header('Location: /');
            exit;
        }

        $createdAt = isset($relato['created_at']) ? FormatarData::formatar($relato['created_at']) : null;


        $respostas = Respostas::select('texto, created_at')
            ->where('relato_id', $relato['id'])
            ->get();

        foreach ($respostas as $r) {
            $mensagens[] = [
                'autor' => 'atendente',
                'texto' => $r['texto'],
                'data' => $r['created_at'] ?? null
            ];
        }

        $perguntas = Perguntas::select('texto, created_at')
            ->where('relato_id', $relato['id'])
            ->get();

        foreach ($perguntas as $p) {
            $mensagens[] = [
                'autor' => 'colaborador',
                'texto' => $p['texto'],
                'data' => $p['created_at'] ?? null
            ];
        }

        $mensagens = array_filter($mensagens, fn($m) => !empty($m['data']));
        usort($mensagens, fn($a, $b) => strtotime($a['data']) <=> strtotime($b['data']));

        if($relato['anonimo']){
            $nome = 'Anônimo';
        }else{
            $nome = $relato['nome'] ?? '';
        }

        $this->render('acompanhe', [
            'title' => "Herbarium | Painel do Acompanhe",
            'protocolo' => $protocolo,
            'created_at' => $createdAt,
            'mensagens' => $mensagens,
            'nome' => $nome,
            'isAtendente' => $isAtendente
        ]);
    }

    public function store()
    {
        $data = json_decode(file_get_contents('php://input'), true);

        if (!isset($data['protocolo']) && empty($data['protocolo'])) {
            http_response_code(400);
            echo json_encode(['error' => 'Protocolo não informado'], JSON_UNESCAPED_UNICODE);
            return;
        }

        $relato = Relatos::select()->where('protocolo', $data['protocolo'])->one();

        if (!$relato) {
            http_response_code(400);
            echo json_encode(['error' => 'Relato não encontrado'], JSON_UNESCAPED_UNICODE);
            return;
        }

        if ($relato['status'] === 'fechado') {
            http_response_code(400);
            echo json_encode(['error' => 'Relato fechado'], JSON_UNESCAPED_UNICODE);
            return;
        }

        if ($relato['status'] === 'respondido') {
            http_response_code(400);
            echo json_encode(['error' => 'Relato respondido'], JSON_UNESCAPED_UNICODE);
            return;
        }
 
        http_response_code(200);
        echo json_encode(['protocolo' => $relato['protocolo']], JSON_UNESCAPED_UNICODE);
    }


    public function send()
    {
        $data = json_decode(file_get_contents('php://input'), true);

        $relato = Relatos::select()->where('protocolo', $data['protocolo'])->one();

        if($data['isAtendente']){

            $resposta = new Respostas();

            $dataResposta = array(
                'relato_id' => $relato['id'],
                'texto' => $data['mensagem'],
                'created_at' => date('Y-m-d H:i:s')
            );

            if($relato['status'] === 'novo'){

                $dataRelato = array(
                    'status' => 'em_andamento'
                );

                Relatos::update($dataRelato)->where('id', $relato['id'])->execute();
            }

            $resposta->insert($dataResposta)->execute();

            http_response_code(200);
            echo json_encode(['success' => true], JSON_UNESCAPED_UNICODE);
            return;
        }

        $pergunta = new Perguntas();

        $dataPergunta = array(
            'relato_id' => $relato['id'],
            'texto' => $data['mensagem'],
            'created_at' => date('Y-m-d H:i:s')
        );

        $pergunta->insert($dataPergunta)->execute();

        http_response_code(200);
        echo json_encode(['success' => true], JSON_UNESCAPED_UNICODE);
        return;

    }

}
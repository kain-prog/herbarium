<?php

namespace src\controllers;

use core\Controller;
use core\Request;
use src\models\Atendentes;

class AuthController extends Controller
{
    public function login(){

        $this->render('login', []);
    }

    public function auth(){

        $data = json_decode(file_get_contents('php://input'), true);

        $atendente = Atendentes::select()->where('usuario', $data['username'])->one();

        if(!$atendente){
            http_response_code(401);
            echo json_encode(['error' => 'Atendente não existe no banco de dados.'], JSON_UNESCAPED_UNICODE);
            return;
        }

        if ($atendente && password_verify($data['password'], $atendente['password'])) {
            
            http_response_code(200);
            echo json_encode(['message' => 'Login realizado com sucesso!'],  JSON_UNESCAPED_UNICODE);
            return;
        } else {
            
            http_response_code(401);
            echo json_encode(['error' => 'Credenciais inválidas.'], JSON_UNESCAPED_UNICODE);
            return;
        }
    }

    public function cadastro(){

        $this->render('cadastro', []);
    }

    public function registrar(){

        $data = json_decode(file_get_contents('php://input'), true);

        $atendenteExistente = Atendentes::select()->where('usuario', $data['usuario'])->get();

        if($atendenteExistente){
            http_response_code(409);
            echo json_encode(['error' => 'Usuário já existe.'], JSON_UNESCAPED_UNICODE);
            return;
        }

        $atendente = new Atendentes();

        $password = password_hash($data['password'], PASSWORD_DEFAULT);

        $dataAtendente = array(
            'nome' => $data['nome'],
            'usuario' => $data['usuario'],
            'password' => $password
        );

        $atendente->insert($dataAtendente)->execute();

        http_response_code(201);
        echo json_encode(['message' => 'Atendente cadastrado com sucesso.'], JSON_UNESCAPED_UNICODE);
    }
}
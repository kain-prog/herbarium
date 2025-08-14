<?php

namespace src\utils;

class GerarProtocolo
{
    public static function gerar()
    {
        $micro = explode(' ', microtime());
        $milissegundos = substr($micro[0], 2, 6);
        $segundos = $micro[1];

        $parteNumerica = substr($segundos . $milissegundos, 0, 10);

        $letras = '';
        for ($i = 0; $i < 3; $i++) {
            $letras .= chr(mt_rand(97, 122));
        }

        $numerosFinais = str_pad((string)mt_rand(0, 999), 3, '0', STR_PAD_LEFT);

        return $parteNumerica . '-' . strtoupper($letras) . $numerosFinais;
    }
}
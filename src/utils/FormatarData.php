<?php

namespace src\utils;

class FormatarData
{
    public static function formatar(string $data): string
    {
        $formatter = new \IntlDateFormatter(
            'pt_BR',
            \IntlDateFormatter::LONG,
            \IntlDateFormatter::MEDIUM,
            'America/Sao_Paulo',
            \IntlDateFormatter::GREGORIAN,
            "d 'de' MMMM 'de' yyyy - HH:mm:ss"
        );

        $timestamp = strtotime($data);
        return $formatter->format($timestamp);
    }
}
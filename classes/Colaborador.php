<?php

class Colaborator {
    public function getAll(): array {
        $pdo = Database::getInstance();
        $stmt = $pdo->query("SELECT id, name, role FROM colaborators ORDER BY id DESC");
        return $stmt->fetchAll();
    }
}
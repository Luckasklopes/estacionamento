<?php

require_once "../config.php";
require_once "../models/Mensalista.php";

class MensalistaController {
    public static function cadastrar($nome, $numero, $cor, $modelo, $placa) {
        global $conn;
        $mensalista = new Mensalista($nome, $numero, $cor, $modelo, $placa);
        $stmt = $conn->prepare("INSERT INTO mensalistas (nome, numero, cor, modelo, placa) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$mensalista->nome, $mensalista->numero, $mensalista->cor, $mensalista->modelo, $mensalista->placa]);
    }

    public static function listar() {
        global $conn;
        $stmt = $conn->query("SELECT * FROM mensalistas");
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}

?>

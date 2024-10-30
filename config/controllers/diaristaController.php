<?php

require_once "../config.php";
require_once "../models/Diarista.php";

class DiaristaController {
    public static function registrarEntrada($placa) {
        global $conn;
        $diarista = new Diarista($placa);
        $stmt = $conn->prepare("INSERT INTO diaristas (placa, hora_entrada) VALUES (?, ?)");
        $stmt->execute([$diarista->placa, $diarista->horaEntrada]);
    }

    public static function registrarSaida($placa, $taxaFixa, $taxaHora) {
        global $conn;
        $stmt = $conn->prepare("SELECT * FROM diaristas WHERE placa = ? AND hora_saida IS NULL");
        $stmt->execute([$placa]);
        $diarista = $stmt->fetch(PDO::FETCH_OBJ);

        if ($diarista) {
            $horaSaida = date("Y-m-d H:i:s");
            $diaristaModel = new Diarista($diarista->placa);
            $diaristaModel->horaEntrada = $diarista->hora_entrada;
            $diaristaModel->calcularValor($horaSaida, $taxaFixa, $taxaHora);

            $stmt = $conn->prepare("UPDATE diaristas SET hora_saida = ?, valor_total = ? WHERE placa = ?");
            $stmt->execute([$diaristaModel->horaSaida, $diaristaModel->valorTotal, $placa]);
        }
    }

    public static function listar() {
        global $conn;
        $stmt = $conn->query("SELECT * FROM diaristas WHERE hora_saida IS NULL");
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}

?>

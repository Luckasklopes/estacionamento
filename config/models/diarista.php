<?php

class Diarista {
    public $placa;
    public $horaEntrada;
    public $horaSaida;
    public $valorTotal;

    public function __construct($placa) {
        $this->placa = $placa;
        $this->horaEntrada = date("Y-m-d H:i:s");
    }

    public function calcularValor($horaSaida, $taxaFixa, $taxaHora) {
        $tempo = strtotime($horaSaida) - strtotime($this->horaEntrada);
        $horas = ceil($tempo / 3600);
        $this->valorTotal = $taxaFixa + ($horas * $taxaHora);
        $this->horaSaida = $horaSaida;
    }
}

?>

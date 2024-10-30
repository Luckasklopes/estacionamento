<?php

class Mensalista {
    public $nome;
    public $numero;
    public $cor;
    public $modelo;
    public $placa;

    public function __construct($nome, $numero, $cor, $modelo, $placa) {
        $this->nome = $nome;
        $this->numero = $numero;
        $this->cor = $cor;
        $this->modelo = $modelo;
        $this->placa = $placa;
    }
}

?>

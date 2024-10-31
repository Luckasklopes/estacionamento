<?php
require_once "config.php";
require_once "config/controllers/DiaristaController.php";
require_once "config/controllers/MensalistaController.php";

$action = $_GET['action'] ?? '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($action == 'registrarEntrada') {
        DiaristaController::registrarEntrada($_POST['placa']);
    } elseif ($action == 'cadastrarMensalista') {
        MensalistaController::cadastrar($_POST['nome'], $_POST['numero'], $_POST['cor'], $_POST['modelo'], $_POST['placa']);
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Estacionamento</title>
</head>
<body>
    <h1>Entrada Diarista</h1>
    <?php include 'config/templates/form_diarista.html'; ?>
    
    <h2>Diaristas Atuais</h2>
    <?php include 'config/templates/list_diaristas.php'; ?>
    
    <h1>Cadastro Mensalista</h1>
    <?php include 'config/templates/form_mensalista.html'; ?>
    
    <h2>Mensalistas</h2>
    <?php include 'config/templates/list_mensalistas.php'; ?>
</body>
</html>

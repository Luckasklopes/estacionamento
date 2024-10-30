<?php foreach (MensalistaController::listar() as $mensalista): ?>
    <div class="card">
        <p>Nome: <?php echo $mensalista->nome; ?></p>
        <p>Número: <?php echo $mensalista->numero; ?></p>
        <p>Cor: <?php echo $mensalista->cor; ?></p>
        <p>Modelo: <?php echo $mensalista->modelo; ?></p>
        <p>Placa: <?php echo $mensalista->placa; ?></p>
    </div>
<?php endforeach; ?>

<?php foreach (DiaristaController::listar() as $diarista): ?>
    <div>
        <p>Placa: <?php echo $diarista->placa; ?></p>
        <p>Hora de Entrada: <?php echo $diarista->hora_entrada; ?></p>
    </div>
<?php endforeach; ?>

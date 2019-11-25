<?php foreach ($this->historial as $item) {
    $vehiculo = new Vehiculo();
    $vehiculo = $item;
    ?>
    <tr>
        <td><?php echo $vehiculo->placa; ?></td>
        <td><?php echo $vehiculo->modelo; ?></td>
        <td><?php echo $vehiculo->entrada; ?></td>
        <td><?php echo $vehiculo->salida; ?></td>
    </tr>
<?php } ?>
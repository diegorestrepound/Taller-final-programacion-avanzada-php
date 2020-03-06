<?php require_once 'header.php'; ?>

<h1>Opcion Historial Medico</h1>
<br>
<form action="form1" method="POST" action="./?accion=consultarHistoriamedica">
  
    <p>Paciente:
        <select name="">
        <option value="">Seleccione*</option>
        <?php foreach($consulta as $datos): ?>
            <option value=""><?php echo $datos['nombrepaciente']; ?></option>
        <?php endforeach;?>
        </select>
    
    </p>

</form>

<p>Observacion: <input type="text" name="txtobservacion"></p>
    <p><input type="submit" name="btnguardarObservacion" value="Guardar"></p>
<br>

<table>
    <thead>
        <tr>
            <th>Tipo documento </th>
            <th> Nombre Paciente</th>
        </tr>
    </thead>
    <tbody>
            <?php foreach($consulta as $dato): ?>
            <tr>
                <td><?php echo $dato['tipodoc']; ?></td>
                <td><?php echo $dato['nombrepaciente']; ?></td>
                <td><a href="./?accion=modificar&id=<?php echo $dato['tipodoc']; ?>">Eliminar</a></td>
            </tr>
            <?php endforeach; ?>
    </tbody>
</table>
<br>
<a href="./">Menu principal </a>
<br>
<a href="./">Volver</a>
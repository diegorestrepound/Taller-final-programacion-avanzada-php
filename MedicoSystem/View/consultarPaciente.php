<?php require_once 'header.php'; ?>

<h1>Pacientes </h1>
<br>
<br>
<table>
    <thead>
        <tr>
            <th>  Tipo de documento  </th>
            <th>  Numero de documento  </th>
            <th>  nombre paciente  </th>
            <th>  Genero  </th>
            <th>  Edad  </th>
            <th>  Modificar  </th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($consultarPaciente as $dato): ?>
        <tr>
            <td><?php echo $dato['nombretipodoc']; ?></td>
            <td><?php echo $dato['numerodocumento']; ?></td>
            <td><?php echo $dato['nombrepaciente']; ?></td>
            <td><?php echo $dato['nombregenero']; ?></td>
            <td><?php echo $dato['edad']; ?></td>
            <td><a href="./?accion=modificar&id=<?php echo $dato['numerodocumento']; ?>">Modificar</a></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<a href="./?accion=menuPacientes">Registrar paciente</a>
<a href="./">Menu principal </a>

<?php require_once 'footer.php'; ?>
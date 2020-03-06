<?php require_once 'header.php'; ?>
    <h1>Agregar Medico</h1>
    <br>
    <form name="form1" method="POST" action="./?accion=guardarMedico">
        
        <p>Tipo de documento:
            <select name="seltipodoc">
                <option value="">Seleccione*</option>
                <?php foreach($consulta as $dato): ?>

                    <option value=""><?php echo $dato['tipodoc']; ?></option>

                <?php endforeach; ?>
            </select>
        </p>
        
        <p>Numero de documento: <input type="text" name="txtnumerodocumento"></p>
        <P>Nombre: <input type="text" name="txtnombre"></P>
        <p><input type="submit" name="btngardarmedico" value="Guardar"></p>
    </form>
    <br>
    <table>
        <thead>
            <tr>
                <th>  Tipo de documento  </th>
                <th>  Numero de documento  </th>
                <th>  nombre paciente  </th>
                <th>  Modificar  </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($consulta as $dato): ?>
            <tr>
                <td><?php echo $dato['tipodoc']; ?></td>
                <td><?php echo $dato['numerodocumento']; ?></td>
                <td><?php echo $dato['nombre']; ?></td>
                <td><a href="./?accion=modificar&id=<?php echo $dato['tipodoc']; ?>">Modificar</a></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <a href="./">Volver</a>


<?php require_once 'footer.php'; ?>
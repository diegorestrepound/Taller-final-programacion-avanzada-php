<?php require_once 'header.php'; ?>
    <h1>Agregar Paciente</h1>
    <br>
    <form name="form1" method="POST" action="./?accion=guardarPaciente">
        <P>Nombre: <input type="text" name="txtnombre"></P>
        <p>Tipo de documento:
            <select name="seldocumento">
                <option value="">Seleccione*</option>
                <?php foreach($consultarTipodoc as $dato): ?>

                    <option value="<?php echo $dato['tipodoc']; ?>"><?php echo $dato['nombre']; ?></option>

                <?php endforeach; ?>
            </select>
        </p>
        <p>Numero de documento: <input type="text" name="txtnumerodoc"></p>
        <p>Genero: <input type="text" name="txtgenero"></p>
        <p>Edad: <input type="text" name="txtedad"></p>
        <p><input type="submit" name="btnguardarpaciente" value="Guardar"></p>
    </form>
    <a href="./?accion=consultarPaciente">Consultar pacientes </a>
    

    <a href="./">Volver</a>


<?php require_once 'footer.php'; ?>
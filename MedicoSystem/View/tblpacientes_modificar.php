  
<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <meta http-equiv="content-type" content="text/html"; charset="utf-8" />
    <title></title>
    </head>
    <body>
        <?php foreach($consulta as $dato): ?>
        <h1>Modificar información</h1>
        <br>




        <form name="form1" method="POST" action="./?accion=actualizarPaciente">
        <P>Nombre: <input type="text" name="txtnombre" value=<?php echo $dato['nombrepaciente']; ?>></P>
        <p>Tipo de documento:
            <select name="seldocumento">
                <option value="">Seleccione*</option>
                <?php foreach($consultarTipodoc as $dato): ?>

                    <option value="<?php echo $dato['tipodoc']; ?>"><?php echo $dato['nombre']; ?></option>

                <?php endforeach; ?>
            </select>
        </p>
        <p>Numero de documento: <input type="text" name="txtnumerodoc" value=<?php echo $dato['numerodocumento']; ?>></p>
        <p>Genero: <input type="text" name="txtgenero" value=<?php echo $dato['nombregenero']; ?>></p>
        <p>Edad: <input type="text" name="txtedad" value=<?php echo $dato['edad']; ?>></p>
        <p><input type="submit" name="btnguardarcambios" value="Guardar Cambios"></p>
    </form>
        <?php endforeach; ?>


        
    </body>
</html> 
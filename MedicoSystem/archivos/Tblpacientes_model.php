<?php 

require_once 'model/Tblpacientes_model.php';
class Tblpacientes_model{

    private $bd;
    private $tblpacientes;

    public function __construct(){
        $this->bd=conexion::getConexion();
         $this->tblpacientes = array();
         $this->tbltipodocumento = array();
         $this->tblgenero = array();

    }

    public function insertarpacientes($dato){
        $numerodocumento = $dato['numerodocumento'];
        $idtipodoc = $dato['tipodoc'];
        $nombre = $dato['nombre'];
        $apellido = $dato['apellido'];
        $idgenero = $dato['genero'];
        $edad = $dato['edad'];
        $consulta = "INSERT INTO tblpacientes (numerodocumento,tipodoc,nombre,apellido,genero,edad) VALUES ('$numerodocumento','$idtipodoc','$nombre',
        '$apellido','$idgenero','$edad')";
        mysqli_query($this->bd,$consulta) or die ("error al insertar el paciente");
    }

    public function consultatipodocumento(){
        $consulta=$this->bd->query("SELECT * FROM tbltipodocumento");
        while($fila=$consulta->fetch_assoc()){
            $this->tbltipodocumento[]=$fila;
        }
        return $this->tbltipodocumento;



    }
    public function consultagenero(){
        $consultagenero=$this->bd->query("SELECT * FROM tblgenero");
        while($fila=$consultagenero->fetch_assoc()){
            $this->tblgenero[]=$fila;
        }
        return $this->tblgenero;




    }
    public function consultapacientes(){
        $consultapacientes=$this->bd->query("SELECT t.nombre AS 'tipodoc', p.numerodocumento, p.nombre, p.apellido, g.nombre AS 'tipogenero', p.edad FROM tblpacientes p INNER JOIN tbltipodocumento t ON p.tipodoc = t.idtipodoc INNER JOIN tblgenero g ON p.genero = g.idgenero");
        while($fila=$consultapacientes->fetch_assoc()){
            $this->tblpacientes[]=$fila;
        }
        return $this->tblpacientes;



    }
    public function actualizarPaciente($dato){
        $numerodocumento = $dato['numerodocumento'];
        $idtipodoc = $dato['tipodoc'];
        $nombre = $dato['nombre'];
        $apellido = $dato['apellido'];
        $idgenero = $dato['genero'];
        $edad = $dato['edad'];

        $consulta = "UPDATE tblpacientes SET nombre = '$nombre', tipodoc = $idtipodoc, apellido = '$apellido', genero = $idgenero, edad = $edad WHERE numerodocumento = $numerodocumento";
        mysqli_query($this->bd, $consulta) or die ("Error al actualizar los datos");
    }
    public function  consulta($accion_sql){
        $consulta = $this->bd->query($accion_sql);
        while($fila = $consulta->fetch_assoc()){
            $this->tblpacientes[] = $fila;
        }
        return $this->tblpacientes; 
    }
   
    public function consultarPorId($id){
        $consulta = $this->bd->query("SELECT * FROM tblpacientes WHERE numerodocumento = $id;");
        $fila = $consulta->fetch_assoc();
        $this->tblpacientes[] = $fila;
        return $this->tblpacientes;
    }


 
    
   
    
}








?>
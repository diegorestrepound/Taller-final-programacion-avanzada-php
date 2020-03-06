<?php 

    class Tblpacientes_model{
        private $bd;
        private $tblpacientes;

        public function __construct(){
            $this->bd = Conexion::getConexion();
            $this->tblpacientes = array();
        }

        public function consultarPorId($accion_sql){
            $consulta = $this->bd->query($accion_sql);
            $fila = $consulta->fetch_assoc();
            $this->tblpacientes[] = $fila;
            return $this->tblpacientes; 
        }

        public function consultarPaciente(){
            $consulta = $this->bd->query("SELECT tblpacientes.numerodocumento,tbltipodocumento.nombre AS 'nombretipodoc',tblpacientes.nombre AS 'nombrepaciente',tblpacientes.apellido,tblgenero.nombre AS 'nombregenero',tblpacientes.edad  FROM tblpacientes, tbltipodocumento,tblgenero WHERE tblpacientes.tipodoc = tbltipodocumento.idtipodoc AND tblpacientes.genero = tblgenero.idgenero ");
            while($fila=$consulta->fetch_assoc()){
                $this->tblpacientes[] = $fila;
            }
            return $this->tblpacientes;
        }

        public function insertPaciente($dato){

            $tipodoc = $dato['nombretipodoc'];
            $numerodoc = $dato['numerodocumento'];
            $nombre = $dato['nombrepaciente'];
            $genero = $dato['nombregenero'];
            $edad = $dato['edad'];
            $consulta = "INSERT INTO tblpacientes (tipodoc, numerodocumento , nombre, genero, edad) VALUES ($tipodoc, $numerodoc, '$nombre', '$genero',$edad)";
            mysqli_query($this->bd, $consulta) or die ("Error al guardar el producto.");
        }


        



        public function consultarTipodoc(){
            $consulta = $this->bd->query("SELECT * FROM tbltipodocumento");
            while( $fila = $consulta->fetch_assoc()){
                $this->tbltipodocumento[] = $fila;
            }
            return $this->tbltipodocumento;
        }

        public function actualizarPaciente($dato){
            $tipodoc = $dato['nombretipodoc'];
            $numerodoc = $dato['numerodocumento'];
            $nombre = $dato['nombrepaciente'];
            $genero = $dato['nombregenero'];
            $edad = $dato['edad'];

            $consulta = "UPDATE tblpacientes SET numerodocumento=$numerodoc,nombre = '$nombre', genero=$genero, edad=$edad  WHERE nombre = $tipodoc";
            mysqli_query($this->bd, $consulta) or die ("Error al actualizar los datos");
        }
    }

    
?>
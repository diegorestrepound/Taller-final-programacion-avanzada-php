<?php 
    class Tblmedicos_model{
        private $bd;
        private $tblmedicos;
        private $tbltipodocumento;

        public function __construct(){
            $this->bd = Conexion::getConexion();
            $this->tblmedicos=array();
            $this->tbltipodocumento=array();
        }


        public function consultarMedico(){
            $consulta = $this->bd->query("SELECT tipodoc, numerodocumento, nombre FROM tblmedicos");
            while($fila=$consulta->fetch_assoc()){
                $this->tblmedicos[] = $fila;
            }
            return $this->tblmedicos;
        }

        public function consultaTipodoc(){
            $consulta = $this->bd->query("SELECT nombre FROM tbltipodocumento");
            while($fila=$consulta->fetch_assoc()){
                $this->tbltipodocumento[] = $fila; 
            }
            return $this->tbltipodocumento;
        }


        public function InsertMedico($dato){
            $tipodoc=$dato['tipodoc'];
            $numero=$dato['numerodocumento'];
            $nombre=$dato['nombre'];
            $consulta = "INSERT INTO tblmedicos (numerodocumento,tipodoc,nombre) VALUES ($tipodoc,$numero,'$nombre')";
            mysqli_query($this->bd,$consulta) or die ("Error al insertar Dato");
        }

        public function actualizarMedico($dato){
            $tipodoc=$dato['tipodoc'];
            $numerodoc=$dato['numerodocumento'];
            $nombre=$dato['nombre'];
            $consulta = "UPDATE tblmedicos SET tipodoc=$tipodoc, nombre='$nombre', numerodocumento=$numerodoc  WHERE numerodocumento = $numerodoc";
            mysqli_query($this->bd, $consulta) or die ("Error al Guardar.");
        }
    }
?>
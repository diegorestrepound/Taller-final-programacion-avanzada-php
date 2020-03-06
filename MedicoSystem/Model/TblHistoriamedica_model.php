<?php 
    class TblHistoriamedica_model{
        private $bd;
        private $tblpacientes;

        public function __construct(){
            $this->bd = Conexion::getConexion();
            $this->tblpacientes=array();
        }

        public function InsertarObservacion($dato){
            $observacion = $dato['observacion'];
            $consulta = "INSERT INTO tblobservacion (observacion) VALUES ('$observacion')";
            mysqli_query($this->bd,$consulta) or die ("Error al insertar la observacion");
        }

        public function consultarHistoriamedica(){
            $consulta = $this->bd->query("SELECT  tbltipodocumento.nombre AS 'tipodoc', tblpacientes.nombre AS 'nombrepaciente' FROM tblpacientes  INNER JOIN tbltipodocumento ORDER BY tblpacientes.nombre ASC");
            $consulta2 = $this->bd->query("SELECT tblmedicos.nombre AS 'nombremedico' FROM tblmedicos");
            while ($fila=$consulta->fetch_assoc()) {
                $this->tblpacientes[] = $fila;
            }
            return $this->tblpacientes; 
        }

        public function consultarMedico(){
            $consulta2 = $this->bd->query("SELECT tblmedicos.nombre AS 'nombremedico' FROM tblmedicos");
            while ($fila=$consulta2->fetch_assoc()) {
                $this->tblpacientes[] = $fila;
            }
            return $this->tblpacientes;
        }
    }
?>
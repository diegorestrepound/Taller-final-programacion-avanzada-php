<?php 

require_once 'model/Tblpacientes_model.php';

    class Tblpacientes_controller{
        private $model_pacientes;

        public function __construct(){
            $this->model_pacientes = new Tblpacientes_model();
        }
        public function consultarPaciente(){
            $consultarPaciente = $this->model_pacientes->consultarPaciente();
            require_once 'view/consultarPaciente.php';
        }
        public function menuPacientes(){
            require_once 'view/menuPacientes.php';
        }
        public function guardarPaciente(){
            $dato['nombretipodoc'] = $_POST["seldocumento"];
            $dato['numerodocumento'] = $_POST["txtnumerodoc"];
            $dato['nombrepaciente'] = $_POST["txtnombre"];
            $dato['nombregenero'] = $_POST["txtgenero"];
            $dato['edad'] = $_POST["txtedad"];
            $this->model_pacientes->insertPaciente($dato);
            $this->menuPacientes();
        }
        public function consultarTipodoc(){
            $consultarTipodoc = $this->model_pacientes->consultarTipodoc();
            require_once 'view/menuPacientes.php';
        }

        public function actualizarPaciente(){
            $dato['nombretipodoc'] = $_POST["seldocumento"];
            $dato['numerodocumento'] = $_POST["txtnumerodoc"];
            $dato['nombrepaciente'] = $_POST["txtnombre"];
            $dato['nombregenero'] = $_POST["txtgenero"];
            $dato['edad'] = $_POST["txtedad"];

            $this->model_pacientes->actualizarPaciente($dato);
            require_once 'view/tblpacientes_modificar.php';
        }
        
    }

?>
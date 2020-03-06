<?php 

require_once 'model/Tblmedicos_model.php';

    class Tblmedicos_controller{
        private $model_medicos;

        public function __construct(){
            $this->model_medicos = new Tblmedicos_model();
        }
        public function menuMedicos(){
            require_once 'view/menuMedicos.php';
        }
        public function consultaTipodoc(){
            $consultaTipodoc = $this->model_medicos->consultaTipodoc();
            $this->menuMedicos();
        }    
        public function consultarMedico(){
            $consulta = $this->model_medicos->consultarMedico();
            $this->menuMedicos();
        }
       
        
        public function guardarMedico(){
            $dato['tipodoc']=$_POST['seltipodoc'];
            $dato['numerodocumento']=$_POST['txtnumerodocumento'];
            $dato['nombre']=$_POST['txtnombre'];
            $this->model_medicos->insertMedico($dato);
            $this->menuMedicos();
        }
        

        public function actualizarMedico(){
            $dato['tipodoc']=$_POST['seltipodoc'];
            $dato['numerodocumento']=$_POST['txtnumerodocumento'];
            $dato['nombre']=$_POST['txtnombre'];
            $this->model_medicos->actualizarMedico($dato);
            require_once 'view/tblmedicos_modificar.php';
        }
        
    }

?>
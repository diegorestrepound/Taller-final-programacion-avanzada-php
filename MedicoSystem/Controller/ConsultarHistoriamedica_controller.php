<?php 
    require_once 'Model/TblHistoriamedica_model.php';
    class ConsultarHistoriamedica_controller{

        private $model_historias;

        public function __construct(){
            $this->model_historias = new TblHistoriamedica_model();
        }

        public function menuHistoriamedica(){
            $consulta = $this->model_historias->consultarHistoriamedica();
            require_once 'view/menuHistoriamedica.php';
        }


    }

?>
<?php 


require_once 'Conexion/Conexion.php';
require_once 'Controller/Index_controller.php';
require_once 'Controller/Tblpacientes_controller.php';
require_once 'Controller/ConsultarHistoriamedica_controller.php';
require_once 'Controller/Tblmedicos_controller.php';

$controller = new Index_controller();
$controller_pacientes =  new Tblpacientes_controller();
$controller_medicos = new Tblmedicos_controller();
$consultarHistoriamedica_controller = new ConsultarHistoriamedica_controller();


if(!empty($_REQUEST['accion'])){

$metodo = $_REQUEST['accion'];

    switch($metodo){

        case method_exists($controller, $metodo):
            $controller->index();
        break;
        case method_exists($controller_pacientes, $metodo):
            $controller_pacientes->$metodo();
        break;
        case method_exists($consultarHistoriamedica_controller, $metodo):
            $consultarHistoriamedica_controller->$metodo();
        break;
        case method_exists($controller_medicos, $metodo):
            $controller_medicos->$metodo();
        break;
        default:
        $controller->index();

    }

}else{
    $controller->index();
}

?>
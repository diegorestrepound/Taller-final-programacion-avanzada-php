<?php 

require_once 'model/Tblpacientes_model.php';

class Tblpacientes_controller{

    private $model_pacientes;
    

    public function __construct(){

        $this->model_pacientes=new Tblpacientes_model();
    }

    public function paciente(){
        $consulta =$this->model_pacientes->consultatipodocumento();
        $consultagenero=$this->model_pacientes->consultagenero();
        $consultapacientes=$this->model_pacientes->consultapacientes();
        
        require_once 'view/paciente.php';
    }
  
   


   
    public function guardarpacientes(){
        $dato['numerodocumento']=$_POST['txtnumerodocumento'];
        $dato['tipodoc']=$_POST['seldocumento'];
        $dato['nombre']=$_POST["txtnombre"];
        $dato['apellido']=$_POST["txtapellido"];
        $dato['genero']=$_POST["selgenero"];
        $dato['edad']=$_POST["txtedad"];
        $this->model_pacientes->insertarpacientes($dato);
        $this->paciente();
    }
    public function consultap(){
        
        $consultapacientes=$this->model_pacientes->consultapacientes();
        require_once 'view/consultap.php';
    }
    public function modificarp(){
       
        $id = $_REQUEST['id'];
        $consulta = $this->model_pacientes->consultarPorId($id);
        $consultadocumentos = $this->model_pacientes->consultatipodocumento();
        $consultagenero = $this->model_pacientes->consultagenero();
       
        require_once 'view/modificarp.php';
    }
    
    public function guardarpaciente(){
        $dato['nombre']=$_POST["txtnombre"];
        $this->model_pacientes->insertarpacientes($dato);
        $this->consultap();
    }
    
  
    public function guardarCambiosPaciente(){
        $dato['numerodocumento']=$_POST['txtnumerodocumento'];
        $dato['tipodoc']=$_POST['seldocumento'];
        $dato['nombre']=$_POST["txtnombre"];
        $dato['apellido']=$_POST["txtapellido"];
        $dato['genero']=$_POST["selgenero"];
        $dato['edad']=$_POST["txtedad"];

        $this->model_pacientes->actualizarpaciente($dato);
        $this->consultap();
    }

   
}






?>
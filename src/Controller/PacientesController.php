<?php
namespace App\Controller;

use App\Controller\AppController;

class PacientesController extends AppController{
	public function index(){

    }
	
	public function adicionar(){
		if (!empty($this->request->data)){
			pr($this->request->data);
			
			//$this->Paciente->save($this->request->data);
			exit();	
		}	
    }
	
	public function editar(){
		
    }

	public function deletar(){
		
    }
}
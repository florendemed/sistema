<?php
namespace App\Controller;

use App\Controller\AppController;

class AtendimentosController extends AppController{
	public function index(){

    }
	
	public function adicionar(){
		
		$this->loadModel('Colaboradores');
		$this->loadModel('Pacientes');
		
		$colaborador = $this->Colaboradores->find('all');
		$colaborador = $colaborador->toArray();
		
		
		$this->set(compact('colaborador'));

    }
	
	public function editar(){

    }

}
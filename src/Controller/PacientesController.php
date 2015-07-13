<?php
namespace App\Controller;

use App\Controller\AppController;

class PacientesController extends AppController{
	public function index(){

    }
	
	public function adicionar(){
		$paciente	= $this->Pacientes->newEntity();
		if ($this->request->is('post')) {
			$paciente 	= $this->Pacientes->patchEntity($paciente, $this->request->data());
			if ($this->Pacientes->save($paciente)) {
				$this->Flash->success('Registro salvo com sucesso.');
				return $this->redirect('/pacientes/index');
			}
			$this->Flash->error('Não é possível salvar o registro.');
		}
		$this->set(compact('paciente'));
    }
	
	public function editar(){
		
    }

	public function deletar(){
		
    }
}
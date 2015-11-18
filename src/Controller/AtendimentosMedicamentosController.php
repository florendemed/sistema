<?php
namespace App\Controller;

use App\Controller\AppController;

class AtendimentosMedicamentosController extends AppController{
	
	public function inserir(){
		$this->autoRender	= false;
		if ($this->request->is('post')) {
			$medicamento = $this->AtendimentosMedicamentos->newEntity($this->request->data);
			$medicamento = $this->AtendimentosMedicamentos->save($medicamento);
			$this->response->body($medicamento->id);
			return $this->response;
		}
    }
	
	public function listar($atendimentos_id){
		$this->layout 		= 'ajax';
		
		$medicamentos = $this->AtendimentosMedicamentos->find('all', [
			'conditions' => [
				'AtendimentosMedicamentos.atendimentos_id' => $atendimentos_id,
			],
			'contain' => 'Medicamentos',
		])->hydrate(false);
		
		$this->set(compact('medicamentos'));
	}
	
	public function excluir($id){
		$this->autoRender = false;
		if ($id != null) {
			$am = $this->AtendimentosMedicamentos->get($id);
			$this->AtendimentosMedicamentos->delete($am);
		}
    }

}
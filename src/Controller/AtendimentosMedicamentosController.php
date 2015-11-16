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
		$this->layout 	  = 'ajax';
		$this->autoRender = false;
		
		/*if ($id != null) {
			$atendimento = $this->Atendimentos->get($id);
			$atendimento->status = 'd';
			$this->Atendimentos->save($atendimento);
			$this->Flash->success('Registro removido com sucesso.');
		} else {
			$this->Flash->error('Não foi possível excluir o registro.');
		}
		
		return $this->redirect('/atendimentos/index');*/
		
    }

}
<?php
namespace App\Controller;

use App\Controller\AppController;

class AtendimentosExamesController extends AppController{
	
	public function inserir(){
		$this->autoRender	= false;
		if ($this->request->is('post')) {
			$exame = $this->AtendimentosExames->newEntity($this->request->data);
			$exame = $this->AtendimentosExames->save($exame);
			$this->response->body($exame->id);
			return $this->response;
		}
    }
	
	public function listar($exames_id){
		$this->layout 		= 'ajax';
		
		$exames = $this->AtendimentosExames->find('all', [
			'conditions' => [
				'AtendimentosExames.atendimentos_id' => $exames_id,
			],
			'contain' => 'Exames',
		])->hydrate(false);
		
		$this->set(compact('exames'));
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
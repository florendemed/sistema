<?php
namespace App\Controller;

use App\Controller\AppController;

class AtendimentosDoencasController extends AppController{
	
	public function inserir(){
		$this->autoRender	= false;
		if ($this->request->is('post')) {
			$doenca = $this->AtendimentosDoencas->newEntity($this->request->data);
			$doenca = $this->AtendimentosDoencas->save($doenca);
			$this->response->body($doenca->id);
			return $this->response;
		}
    }
	
	public function listar($atendimentos_id){
		$this->layout 		= 'ajax';
		
		$doencas = $this->AtendimentosDoencas->find('all', [
			'conditions' => [
				'AtendimentosDoencas.atendimentos_id' => $atendimentos_id,
			],
			'contain' => 'Doencas',
		])->hydrate(false);
		$this->set(compact('doencas'));
	}
	
	public function excluir($id){
		$this->autoRender = false;
		if ($id != null) {
			$ad = $this->AtendimentosDoencas->get($id);
			$this->AtendimentosDoencas->delete($ad);
		}
    }

}
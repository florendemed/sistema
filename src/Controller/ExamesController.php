<?php
namespace App\Controller;

use App\Controller\AppController;

class ExamesController extends AppController{
	
	public $helpers = [
		'Paginator'
	];
	
	public $paginate = [
        'limit' => 10
    ];
	
	public function index(){
		
		$condicoes = [];
		
		if (!empty($this->request->query)){
			
			if (isset($this->request->query['nome']) && $this->request->query['nome'] != ''){
				$condicoes['nome LIKE'] = '%'.$this->request->query['nome'].'%';
			} 

		}
			
		$this->paginate = [
			'conditions' => $condicoes
		];		
		$exames = $this->paginate($this->Exames);
		$this->set(compact('exames'));
    }
	
	public function adicionar(){
		
		if ($this->request->is('post')) {
			
			$exame	= $this->Exames->newEntity($this->request->data);
			
			if ($this->Exames->save($exame)) {
				
				$this->Flash->success(__('Registro inserido com sucesso.'));
				return $this->redirect('/exames/index');
			}
			$this->Flash->error(__('Não foi possível salvar o registro.'));
		}
		$exame	= $this->Exames->newEntity();
		$this->set(compact('exame'));
		
    }
	
	public function editar($id){

		$exame = $this->Exames->get($id);
		
		//Dados postados
		if ($this->request->is('put')) {
			
			$exame = $this->Exames->patchEntity($exame, $this->request->data);

			if ($exame['status'] == '0'){
				$exame['status'] = 'i';
			}
			
			if ($this->Exames->save($exame)) {
				
				$this->Flash->success(__('Registro alterado com sucesso.'));
				return $this->redirect(['action' => 'index']);

			}
			$this->Flash->error(__('Não foi possível salvar o registro.'));
		} 
		
		$this->set(compact('exame'));

    }
	
	public function excluir($id){
		
		$this->autoRender = false;
		
		if ($id != null) {
			$exame = $this->Exames->get($id);
			$exame->status = 'd';
			$this->Exames->save($exame);
			$this->Flash->success('Registro removido com sucesso.');
		} else {
			$this->Flash->error('Não foi possível excluir o registro.');
		}
		
		return $this->redirect('/exames/index');
		
    }
	
	public function buscar(){
		$this->layout 		= 'ajax';
		$this->autoRender	= false;
		
		$busca = $this->request->query['busca'];
		
		$exame = $this->Exames->find('list', [
			'conditions' => [
				'Exames.nome LIKE' => '%'.$busca.'%',
			],
			'keyField' => 'id', 
			'valueField' => 'nome',
		])->hydrate(false);
		
		
		
		if ( $exame->count() > 0 ) {
			$retorno	= [];
			foreach ( $exame as $e_id => $e_nome ) {
				$item['value']	= $e_id;
				$item['label']	= $e_nome;
				$retorno[]	= $item;
			}
		}

		$json = json_encode($retorno);
		//if ( $this->request->is('requested') ) {
			$this->response->body($json);
			return $this->response;
		//}
	}

}
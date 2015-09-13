<?php
namespace App\Controller;

use App\Controller\AppController;

class PermissoesController extends AppController{
	
	public $helpers = [
		'Paginator'
	];
	
	public $paginate = [
        'limit' => 10
    ];
	
	public function index(){
		
		$condicoes = [];
		
		if (!empty($this->request->query)){
			
			if ($this->request->query['nome'] != ''){
				$condicoes['nome LIKE'] = '%'.$this->request->query['nome'].'%';
			} 
			
			if ($this->request->query['controlador'] != ''){
				$condicoes['controlador LIKE'] = '%'.$this->request->query['controlador'].'%';
			} 
			
			if ($this->request->query['acao'] != ''){
				$condicoes['acao LIKE'] = '%'.$this->request->query['acao'].'%';
			} 
		}
			
		$this->paginate = [
			'conditions' => $condicoes
		];		
		$permissoes = $this->paginate($this->Permissoes);
		$this->set(compact('permissoes'));
    }
	
	public function adicionar(){
		
		if ($this->request->is('post')) {
			
			$permissao	= $this->Permissoes->newEntity($this->request->data);
			pr($permissao);
			
			if ($this->Permissoes->save($permissao)) {
				
				$this->Flash->success(__('Registro inserido com sucesso.'));
				return $this->redirect('/permissoes/index');
				
			}
			$this->Flash->error(__('Não foi possível salvar o registro.'));
		}
		$permissao = $this->Permissoes->newEntity();
		$this->set(compact('permissao'));
		
    }
	
	public function editar($id){
		
		$permissao = $this->Permissoes->get($id);
		
		//Dados postados
		if ($this->request->is('put')) {
			
			$permissao = $this->Permissoes->patchEntity($permissao, $this->request->data);
			
			if ($permissao['menu'] == '0'){
				$permissao['menu'] = 'n';
			}
			
			if ($permissao['status'] == '0'){
				$permissao['status'] = 'i';
			}
			
			if ($this->Permissoes->save($permissao)) {
				
				$this->Flash->success(__('Registro alterado com sucesso.'));
				return $this->redirect(['action' => 'index']);
				
			}
			$this->Flash->error(__('Não foi possível salvar o registro.'));
		} 
		$this->set(compact('permissao'));
	}
	
	public function excluir($id){
		
		$this->autoRender = false;
		
		if ($id != null) {
			$permissao = $this->Permissoes->get($id);
			$permissao->status = 'd';
			$this->Permissoes->save($permissao);
			$this->Flash->success('Registro removido com sucesso.');
		} else {
			$this->Flash->error('Não foi possível excluir o registro.');
		}
		
		return $this->redirect('/permissoes/index');
		
    }
}
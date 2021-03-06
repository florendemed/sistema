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
			
			if (isset($this->request->query['nome']) && $this->request->query['nome'] != ''){
				$condicoes['Permissoes.nome LIKE'] = '%'.$this->request->query['nome'].'%';
			} 
			
			if (isset($this->request->query['controlador']) && $this->request->query['controlador'] != ''){
				$condicoes['Permissoes.controlador LIKE'] = '%'.$this->request->query['controlador'].'%';
			} 
			
			if (isset($this->request->query['acao']) && $this->request->query['acao'] != ''){
				$condicoes['Permissoes.acao LIKE'] = '%'.$this->request->query['acao'].'%';
			} 
		}
			
		$this->paginate = [
			'conditions' => $condicoes,
			'contain' => ['PermissaoPai'],
			'order' => array(
				'Permissoes.id' => 'DESC'
			),
		];
		$permissoes = $this->paginate($this->Permissoes);
		$this->set(compact('permissoes'));
    }
	
	public function adicionar(){
		
		$permissaoPai = $this->Permissoes->find('list', ['keyField' => 'id', 'valueField' => 'nome']);
		$permissaoPai = $permissaoPai->toArray();
		$permissao = $this->Permissoes->newEntity();

		if ($this->request->is('post')) {
			if ($this->request->data['menu'] == '0'){
				$this->request->data['menu'] = 'n';
			}
			
			if ($this->request->data['permissao_id'] == ''){
				$this->request->data['permissao_id'] = '0';
			}
			
			$permissao	= $this->Permissoes->patchEntity($permissao, $this->request->data);
			
			if ($this->Permissoes->save($permissao)) {
				
				$this->Flash->success(__('Registro inserido com sucesso.'));
				return $this->redirect('/permissoes/index');
				
			}
			$this->Flash->error(__('Não foi possível salvar o registro.'));
			
		}
		$this->set(compact('permissaoPai','permissao'));
		
    }
	
	public function editar($id){
		
		$permissaoPai = $this->Permissoes->find('list', ['keyField' => 'id', 'valueField' => 'nome']);
		$permissaoPai = $permissaoPai->toArray();
		
		$permissao = $this->Permissoes->get($id);
		$permissaoSelecionado = $permissao->toArray();
		$permissaoSelecionado = $permissao['permissao_id'];
		
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
		$this->set(compact('permissaoPai', 'permissaoSelecionado', 'permissao'));
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
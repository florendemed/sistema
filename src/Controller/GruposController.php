<?php
namespace App\Controller;

use App\Controller\AppController;

class GruposController extends AppController{
	
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
			
		}
			
		$this->paginate = [
			'conditions' => $condicoes
		];		
		$grupos = $this->paginate($this->Grupos);
		$this->set(compact('grupos'));
    }
	
	public function adicionar(){
		
		$this->loadModel('Permissoes');
		$this->loadModel('GruposPermissoes');

		$permissoes = $this->Permissoes->find('all');
		$permissoes = $permissoes->toArray();
		
		if ($this->request->is('post')) {

			$grupo = $this->Grupos->newEntity($this->request->data);
			
			if ($grupo['restrito'] == '0'){
				$grupo['restrito'] = 'n';
			}
			
			if ($grupo = $this->Grupos->save($grupo)) {

				foreach($this->request->data['permissao']['nome'] as $item){

					if ( $item != '0' ){

						$salvarGruposPermissoes['grupos_id'] 	= $grupo['id'];
						$salvarGruposPermissoes['permissoes_id'] = $item;
					
						$gruposPermissoes = $this->GruposPermissoes->newEntity($salvarGruposPermissoes);
						$this->gruposPermissoes->save($gruposPermissoes);
					}
					
				}

				$this->Flash->success(__('Registro inserido com sucesso.'));
				return $this->redirect('/grupos/index');
				
			}
			$this->Flash->error(__('Não foi possível salvar o registro.'));
		}
		$grupo = $this->Grupos->newEntity();
		$this->set(compact('grupo', 'permissoes', 'gruposPermissoes'));
		
    }
	
	public function editar($id){
		
		$this->loadModel('Permissoes');
		$this->loadModel('GruposPermissoes');

		$GruposPermissoes = $this->GruposPermissoes->find('all');
		$GruposPermissoes = $GruposPermissoes->toArray();
		
		$grupo = $this->Grupos->get($id);
		
		if ($this->request->is('put')) {
			
			$grupo = $this->Grupos->patchEntity($grupo, $this->request->data);
			
			if ($grupo['restrito'] == '0'){
				$grupo['restrito'] = 'n';
			}
			
			if ($grupo['status'] == '0'){
				$grupo['status'] = 'i';
			}
			
			if ($this->Grupos->save($grupo)) {
				
				$this->Flash->success(__('Registro alterado com sucesso.'));
				return $this->redirect(['action' => 'index']);
				
			}
			$this->Flash->error(__('Não foi possível salvar o registro.'));
		} 
		$this->set(compact('grupo'));
	}
	
	public function excluir($id){
		
		$this->autoRender = false;
		
		if ($id != null) {
			$grupo = $this->Grupos->get($id);
			$grupo->status = 'd';
			$this->Grupos->save($grupo);
			$this->Flash->success('Registro removido com sucesso.');
		} else {
			$this->Flash->error('Não foi possível excluir o registro.');
		}
		
		return $this->redirect('/grupos/index');
		
    }
}
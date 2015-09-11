<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Controller\EnderecosController;

class ColaboradoresController extends AppController{
	
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
			
			if ($this->request->query['cpf'] != ''){
				$condicoes['cpf LIKE'] = '%'.$this->request->query['cpf'].'%';
			} 

		}
			
		$this->paginate = [
			'conditions' => $condicoes
		];		
		$colaboradores = $this->paginate($this->Colaboradores);
		$this->set(compact('colaboradores'));

    }
	
	public function login(){
		$this->layout = 'login';
		$this->set('title', 'Login');
    }
	
	public function adicionar(){
		
		$this->loadModel('Enderecos');
		$this->loadModel('Telefones');
		
		$colaborador	= $this->Colaboradores->newEntity();
		
		if ($this->request->is('post')) {
			
			$this->request->data['data_nascimento'] = explode('/',$this->request->data['data_nascimento']);
			$this->request->data['data_nascimento'] = array_reverse($this->request->data['data_nascimento']);
			$this->request->data['data_nascimento'] = implode("-", $this->request->data['data_nascimento']);
			
			$colaborador 	= $this->Colaboradores->patchEntity($colaborador, $this->request->data);
			
			if ($this->Colaboradores->save($colaborador)) {
				
				$this->request->data['endereco']['colaborador_id']		= $colaborador->id;
				$this->request->data['telefone']['colaborador_id']		= $colaborador->id;
				
				$endereco 	= $this->Enderecos->newEntity($this->request->data['endereco']);
				$this->Enderecos->save($endereco);
				
				for( $i = 1; $i <= 3; $i++ ){
					$telefone = $this->request->data['telefone'];
					
					if ( $telefone['numero'.$i] != '' ){
						
						$salvarTelefone['tipo'] = $telefone['tipo'.$i];
						$salvarTelefone['numero'] = $telefone['numero'.$i];
						$salvarTelefone['colaborador_id'] = $colaborador->id;
						
						$telefone 		= $this->Telefones->newEntity($salvarTelefone);
						$this->Telefones->save($telefone);
						
					}

				}

				$this->Flash->success(__('Registro inserido com sucesso.'));
				return $this->redirect('/colaboradores/index');
			}
			$this->Flash->error(__('Não foi possível salvar o registro.'));
		}
		$this->set(compact('colaborador'));
    }
	
	public function editar(){
		
    }
	
	public function excluir($id){
		
		$this->autoRender = false;
		
		if ($id != null) {
			$colaborador = $this->Colaboradores->get($id);
			$colaborador->status = 'd';
			$this->Colaboradores->save($colaborador);
			$this->Flash->success('Registro removido com sucesso.');
		} else {
			$this->Flash->error('Não foi possível excluir o registro.');
		}
		
		return $this->redirect('/colaboradores/index');
		
    }
}
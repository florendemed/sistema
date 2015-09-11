<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Controller\EnderecosController;

class PacientesController extends AppController{

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
			
			if ($this->request->query['cartaoSUS'] != ''){
				$condicoes['numero_sus LIKE'] = '%'.$this->request->query['cartaoSUS'].'%';
			} 
		}
			
		$this->paginate = [
			'conditions' => $condicoes
		];		
		$pacientes = $this->paginate($this->Pacientes);
		$this->set(compact('pacientes'));
    }
	
	public function adicionar(){
		
		//$resposta = $this->busca_cep('81210-430');
		//print_r(json_decode($resposta));
		
		$this->loadModel('Enderecos');
		$this->loadModel('Telefones');
		
		$paciente	= $this->Pacientes->newEntity();
		
		if ($this->request->is('post')) {

			$this->request->data['data_nascimento'] = explode('/',$this->request->data['data_nascimento']);
			$this->request->data['data_nascimento'] = array_reverse($this->request->data['data_nascimento']);
			$this->request->data['data_nascimento'] = implode("-", $this->request->data['data_nascimento']);
			
			$paciente 	= $this->Pacientes->patchEntity($paciente, $this->request->data);
			
			if ($this->Pacientes->save($paciente)) {
				
				$this->request->data['endereco']['paciente_id']			= $paciente->id;
				$this->request->data['telefone']['paciente_id']			= $paciente->id;
				
				$endereco 	= $this->Enderecos->newEntity($this->request->data['endereco']);
				$this->Enderecos->save($endereco);
				
				for( $i = 1; $i <= 3; $i++ ){
					$telefone = $this->request->data['telefone'];
					
					if ( $telefone['numero'.$i] != '' ){
						
						$salvarTelefone['tipo'] = $telefone['tipo'.$i];
						$salvarTelefone['numero'] = $telefone['numero'.$i];
						$salvarTelefone['paciente_id'] = $paciente->id;
						
						$telefone 		= $this->Telefones->newEntity($salvarTelefone);
						$this->Telefones->save($telefone);
						
					}

				}

				$this->Flash->success(__('Registro inserido com sucesso.'));
				return $this->redirect('/pacientes/index');
			}
			$this->Flash->error(__('Não foi possível salvar o registro.'));
		}
		$this->set(compact('paciente'));
    }
	
	public function editar($id){
		
		$paciente = $this->Pacientes->get($id);
		
		$this->loadModel('Enderecos');
		$this->loadModel('Telefones');
		
		$endereco = $this->Enderecos->findByPacienteId($id);
		$telefone = $this->Telefones->findAllByPacienteId($id);

		if ($this->request->is('put')) {
			
			$this->request->data['data_nascimento'] = explode('/',$this->request->data['data_nascimento']);
			$this->request->data['data_nascimento'] = array_reverse($this->request->data['data_nascimento']);
			$this->request->data['data_nascimento'] = implode("-", $this->request->data['data_nascimento']);
			
			$this->Pacientes->patchEntity($paciente, $this->request->data);
			if ($this->Pacientes->save($paciente)) {
				$this->Flash->success(__('Registro alterado com sucesso.'));
				return $this->redirect(['action' => 'index']);
			}
			$this->Flash->error(__('Não foi possível salvar o registro..'));
		} 
		$endereco	= $endereco->toArray();
		$endereco	= $endereco['0'];
		$telefone 	= $telefone->toArray();
		$this->set(compact('paciente', 'endereco', 'telefone'));

    }

	public function excluir($id){
		
		$this->autoRender = false;
		
		if ($id != null) {
			$paciente = $this->Pacientes->get($id);
			$paciente->status = 'd';
			$this->Pacientes->save($paciente);
			$this->Flash->success('Registro removido com sucesso.');
		} else {
			$this->Flash->error('Não foi possível excluir o registro.');
		}
		
		return $this->redirect('/pacientes/index');
		
    }
}
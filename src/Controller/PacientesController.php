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
			
			if (isset($this->request->query['nome']) && $this->request->query['nome'] != ''){
				$condicoes['nome LIKE'] = '%'.$this->request->query['nome'].'%';
			} 
			
			if (isset($this->request->query['cpf']) && $this->request->query['cpf'] != ''){
				$condicoes['cpf LIKE'] = '%'.$this->request->query['cpf'].'%';
			} 
			
			if (isset($this->request->query['cartaoSUS']) && $this->request->query['cartaoSUS'] != ''){
				$condicoes['numero_sus LIKE'] = '%'.$this->request->query['cartaoSUS'].'%';
			} 
		}
			
		$this->paginate = [
			'conditions' => $condicoes,
			'order' => array(
				'Pacientes.id' => 'asc'
			),
		];		
		$pacientes = $this->paginate($this->Pacientes);
		$this->set(compact('pacientes'));
    }
	
	public function adicionar(){
		
		$this->loadModel('Enderecos');
		$this->loadModel('Telefones');
		
		if ($this->request->is('post')) {

			$this->request->data['data_nascimento'] = explode('/',$this->request->data['data_nascimento']);
			$this->request->data['data_nascimento'] = array_reverse($this->request->data['data_nascimento']);
			$this->request->data['data_nascimento'] = implode("-", $this->request->data['data_nascimento']);
						
			$paciente = $this->Pacientes->newEntity($this->request->data);
			if ($this->Pacientes->save($paciente)) {
				
				$this->request->data['endereco']['paciente_id']	= $paciente->id;
				$this->request->data['telefone']['paciente_id']	= $paciente->id;
				
				$endereco = $this->Enderecos->newEntity($this->request->data['endereco']);
				$this->Enderecos->save($endereco);

				for( $i = 1; $i <= 3; $i++ ){
					$telefone = $this->request->data['telefone'];
					
					if ( $telefone['numero'.$i] != '' ){
						
						$salvarTelefone['tipo'] = $telefone['tipo'.$i];
						$salvarTelefone['numero'] = $telefone['numero'.$i];
						$salvarTelefone['paciente_id'] = $paciente->id;
						
						$telefone = $this->Telefones->newEntity($salvarTelefone);
						$this->Telefones->save($telefone);
						
					}
				}

				$this->Flash->success(__('Registro inserido com sucesso.'));
				return $this->redirect('/pacientes/index');
			}
			$this->Flash->error(__('Não foi possível salvar o registro.'));
		}
		$paciente	= $this->Pacientes->newEntity();
		$this->set(compact('paciente'));
    }
	
	public function editar($id){

		$this->loadModel('Enderecos');
		$this->loadModel('Telefones');
		
		$paciente = $this->Pacientes->get($id);
		
		//Dados postados
		if ($this->request->is('put')) {
			
			$this->request->data['data_nascimento'] = explode('/',$this->request->data['data_nascimento']);
			$this->request->data['data_nascimento'] = array_reverse($this->request->data['data_nascimento']);
			$this->request->data['data_nascimento'] = implode("-", $this->request->data['data_nascimento']);
			
			$paciente = $this->Pacientes->patchEntity($paciente, $this->request->data);

			if ($paciente['envio_sms'] == '0'){
				$paciente['envio_sms'] = 'n';
			}
			
			if ($paciente['status'] == '0'){
				$paciente['status'] = 'i';
			}
			
			if ($this->Pacientes->save($paciente)) {
				
				//pegar idPaciente
				$this->request->data['endereco']['paciente_id']	= $paciente->id;
				$this->request->data['telefone']['paciente_id']	= $paciente->id;
				
				//Deleta endereço e salva novamente
				$this->Enderecos->deleteAll(['paciente_id' => $id]);
				$endereco = $this->Enderecos->newEntity($this->request->data['endereco']);
				$this->Enderecos->save($endereco);
				
				$this->Telefones->deleteAll(['paciente_id' => $id]);
				
				for( $i = 1; $i <= 3; $i++ ){
					$telefone = $this->request->data['telefone'];
					
					if ( $telefone['numero'.$i] != '' ){
						
						$salvarTelefone['tipo'] = $telefone['tipo'.$i];
						$salvarTelefone['numero'] = $telefone['numero'.$i];
						$salvarTelefone['paciente_id'] = $paciente->id;
						
						$telefone = $this->Telefones->newEntity($salvarTelefone);
						$this->Telefones->save($telefone);
						
					}
				}
	
				$this->Flash->success(__('Registro alterado com sucesso.'));
				return $this->redirect(['action' => 'index']);
				
				
			}
			$this->Flash->error(__('Não foi possível salvar o registro.'));
		} 
		
		//Dados exibidos
		$endereco = $this->Enderecos->findByPacienteId($id);
		$telefone = $this->Telefones->findAllByPacienteId($id);
		$endereco	= $endereco->toArray();
		$endereco	= $endereco['0'];
		$telefone 	= $telefone->toArray();
		
		if ( $paciente->data_nascimento != null){
			$this->request->data['data_nascimento']	= $paciente->data_nascimento->i18nFormat('dd/MM/YYYY');
		}
	
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
	
	public function buscar(){
		
		$this->layout = 'ajax';
		$this->autoRender = false;
		pr($this->request->params);
		
	}
}
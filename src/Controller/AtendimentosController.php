<?php
namespace App\Controller;

use App\Controller\AppController;

class AtendimentosController extends AppController{
	
	public $helpers = [
		'Paginator'
	];
	
	public $paginate = [
        'limit' => 10
    ];
	
	public function index(){
		
		$condicoes = [];
		
		if (!empty($this->request->query)){
			
			

		}
			
		$this->paginate = [
			'conditions' => $condicoes,
			'contain' => ['Pacientes', 'Colaborador', 'Situacao']
		];		
		$atendimento = $this->paginate($this->Atendimentos);
		$this->set(compact('atendimento'));
		
    }
	
	public function adicionar(){
		
		$this->loadModel('Colaboradores');
		$this->loadModel('Pacientes');
		
		$colaborador = $this->Colaboradores->find('list', ['keyField' => 'id', 'valueField' => 'nome']);
		$colaborador = $colaborador->toArray();
		
		$paciente = $this->Pacientes->find('list', ['keyField' => 'id', 'valueField' => 'nome']);
		$paciente = $paciente->toArray();

		if ($this->request->is('post')) {
			
			//$this->request->data['atendimentos_status_id'] = '1';
			$atendimento = $this->Atendimentos->newEntity($this->request->data);
			$atendimento['atendimentos_status_id'] = '1';
			
			if ($this->Atendimentos->save($atendimento)) {
				
				$this->Flash->success(__('Registro inserido com sucesso.'));
				return $this->redirect('/atendimentos/index');
			}
			$this->Flash->error(__('Não foi possível salvar o registro.'));
		}
		$atendimento = $this->Atendimentos->newEntity();
		$this->set(compact('atendimento', 'paciente', 'colaborador'));

    }
	
	public function editar(){

    }
	
	public function excluir(){

    }

}
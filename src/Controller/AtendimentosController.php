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
	
	public function sms($id) {
		$this->autoRender	= false;
		$this->loadComponent('Sms');
		
		$this->loadModel('AtendimentosMedicamentos');
		$this->loadModel('Medicamentos');
		
		$m = $this->Medicamentos->find('all');
		$m = $m->toArray();
		
		$am = $this->AtendimentosMedicamentos->find('all');
		$am = $am->toArray();
		
		$medicamentos = $this->AtendimentosMedicamentos->find('all', [
			'conditions' => [
				'AtendimentosMedicamentos.atendimentos_id' => $id,
			],
			'contain' => 'Medicamentos',
		])->hydrate(false);
		
		$this->set(compact('medicamentos'));
			
		$this->Sms->enviar('55' . $this->request->data['telefone'], 'texticulo do sms');
		pr($id); // <--- esse id ai é o atendimento_id zézona
	}
	
	public function index(){

		$condicoes = [];
		
		if (!empty($this->request->query)){
				
			if (isset($this->request->query['dataInicio']) && $this->request->query['dataInicio'] != '' &&
				isset($this->request->query['dataFim']) && $this->request->query['dataFim'] != ''){
				
				$this->request->query['dataInicio'] = explode('/',$this->request->query['dataInicio']);
				$this->request->query['dataInicio'] = array_reverse($this->request->query['dataInicio']);
				$this->request->query['dataInicio'] = implode("-", $this->request->query['dataInicio']);
				
				$this->request->query['dataFim'] = explode('/',$this->request->query['dataFim']);
				$this->request->query['dataFim'] = array_reverse($this->request->query['dataFim']);
				$this->request->query['dataFim'] = implode("-", $this->request->query['dataFim']);		
					
				$condicoes['Atendimentos.created >='] = $this->request->query['dataInicio'].' 00:00:00';
				$condicoes['Atendimentos.created <='] = $this->request->query['dataFim'].' 23:59:59';
				
				$this->request->query['dataInicio'] = explode('-',$this->request->query['dataInicio']);
				$this->request->query['dataInicio'] = array_reverse($this->request->query['dataInicio']);
				$this->request->query['dataInicio'] = implode("/", $this->request->query['dataInicio']);
				
				$this->request->query['dataFim'] = explode('-',$this->request->query['dataFim']);
				$this->request->query['dataFim'] = array_reverse($this->request->query['dataFim']);
				$this->request->query['dataFim'] = implode("/", $this->request->query['dataFim']);
			} 
			
			if (isset($this->request->query['prioridade']) && $this->request->query['prioridade'] != ''){
				$condicoes['prioridade ='] = $this->request->query['prioridade'];
			} 

		}

		$this->paginate = [
			'conditions' => $condicoes,
			'contain' => ['Pacientes', 'Colaborador', 'Situacao'],
			'order' => array(
				'Atendimentos.id' => 'DESC',
				'Atendimentos.prioridade' => 'ASC'
			),
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
	
	public function editar($id, $render = 'triagem'){
		
		$atendimento = $this->Atendimentos->get($id, [
			'contain' => ['Pacientes', 'Colaborador', 'Situacao']
		]);
		
		if ($this->request->is('put')) {
				
			$atendimento = $this->Atendimentos->patchEntity($atendimento, $this->request->data);

			if ($this->Atendimentos->save($atendimento)) {
				
				$this->Flash->success(__('Registro inserido com sucesso.'));
				return $this->redirect('/atendimentos/index');
			}
			$this->Flash->error(__('Não foi possível salvar o registro.'));
		}
		$this->set(compact('atendimento'));
		$this->render($render);
		
    }
	
	public function excluir($id){
		
		$this->autoRender = false;
		
		if ($id != null) {
			$atendimento = $this->Atendimentos->get($id);
			$atendimento->status = 'd';
			$this->Atendimentos->save($atendimento);
			$this->Flash->success('Registro removido com sucesso.');
		} else {
			$this->Flash->error('Não foi possível excluir o registro.');
		}
		
		return $this->redirect('/atendimentos/index');
		
    }
	
	public function prontuario($pacientes_id){
		
		$this->loadModel('Pacientes');
		
		$paciente = $this->Pacientes->get($pacientes_id,[
			'conditions' => [ 'Pacientes.id' => $pacientes_id],
		]);
		$paciente = $paciente->toArray();

		$dadosProntuario = $this->Atendimentos->find('all',[
			'conditions' => [ 'Atendimentos.pacientes_id' => $pacientes_id],
			'contain' => ['Pacientes', 'Colaborador', 'AtendimentosMedicamentos.Medicamentos', 'AtendimentosDoencas.Doencas',  'AtendimentosExames.Exames'],
		]);
		$dadosProntuario->hydrate(false)->toArray();
		
		$this->set(compact('dadosProntuario', 'paciente'));
	}
	
	public function receita($id) {
		
		$this->layout = 'receita';
		
		$dadosReceita = $this->Atendimentos->get($id,[
			'conditions' => [ 'Atendimentos.id' => $id],
			'contain' => ['Pacientes.Enderecos', 'Pacientes.Telefones', 'Colaborador', 'AtendimentosMedicamentos.Medicamentos'],
			'order' => array(
				'Atendimentos.created' => 'DESC'
			),
		]);
		$dadosReceita->toArray();
		
		$this->set(compact('dadosReceita'));
    }
	
}
<?php
namespace App\Controller;

use App\Controller\AppController;

class RelatoriosController extends AppController{
	
	public function atendimentos(){
		
		$this->loadModel('Atendimentos');
		
		$condicoes = [];
		
		if (!empty($this->request->query)){
				
			$this->request->query['dataInicio'] = explode('/',$this->request->query['dataInicio']);
			$this->request->query['dataInicio'] = array_reverse($this->request->query['dataInicio']);
			$this->request->query['dataInicio'] = implode("-", $this->request->query['dataInicio']);
			
			$this->request->query['dataFim'] = explode('/',$this->request->query['dataFim']);
			$this->request->query['dataFim'] = array_reverse($this->request->query['dataFim']);
			$this->request->query['dataFim'] = implode("-", $this->request->query['dataFim']);

			if (isset($this->request->query['dataInicio']) && $this->request->query['dataInicio'] != '' &&
				isset($this->request->query['dataFim']) && $this->request->query['dataFim'] != ''){
				$condicoes['Atendimentos.created >='] = $this->request->query['dataInicio'].' 00:00:00';
				$condicoes['Atendimentos.created <='] = $this->request->query['dataFim'].' 23:59:59';
			} 
			
			if (isset($this->request->query['prioridade']) && $this->request->query['prioridade'] != ''){
				$condicoes['prioridade ='] = $this->request->query['prioridade'];
			} 

		}
		
		$atendimento = $this->Atendimentos->find('all', [
			'conditions' => $condicoes,
			'contain' => ['Pacientes', 'Colaborador'],
		]);	
		
		$atendimento = $atendimento->toArray();
		$this->set(compact('atendimento'));

    }
}
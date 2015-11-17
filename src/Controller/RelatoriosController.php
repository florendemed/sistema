<?php
namespace App\Controller;

use App\Controller\AppController;

class RelatoriosController extends AppController{
	
	public function index(){
		
	}
	
	public function status_atendimento(){
		
		$this->loadModel('Atendimentos');
		
		$condicoes = [];
		
		$atendimentos_status = $this->AtendimentosStatus->find('list', ['keyField' => 'id', 'valueField' => 'nome']);
		$atendimentos_status = $AtendimentosStatus->toArray();
		
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
		} 
		
		if (isset($this->request->query['status']) && $this->request->query['status'] != ''){
			$condicoes['Atendimentos.atendimentos_status_id ='] = $this->request->query['status'];
		} 
		
		//$query = $this->Atendimentos->query('SELECT s.nome as Status, COUNT(*) as Total FROM atendimentos as a inner join atendimentos_status as s where a.status = "a" and a.atendimentos_status_id = s.id GROUP BY a.atendimentos_status_id ');
		$resultado = $this->Atendimentos->find()
			->select([
				'Situacao.nome',
				'count' => $this->Atendimentos->find()->func()->count('Situacao.id'),
			])
			->where([
				$condicoes
			])
			->contain('Situacao')
			->group('Atendimentos.atendimentos_status_id');
		
		$this->set(compact('resultado','atendimentos_status'));

    }
	
	public function prioridades_atendimento(){
		
		$this->loadModel('Atendimentos');
		
		$condicoes = [];
		
		if (isset($this->request->query['dataInicio']) && $this->request->query['dataInicio'] != '' &&
			isset($this->request->query['dataFim']) && $this->request->query['dataFim'] != ''){
			
			$this->request->query['dataInicio'] = explode('/',$this->request->query['dataInicio']);
			$this->request->query['dataInicio'] = array_reverse($this->request->query['dataInicio']);
			$this->request->query['dataInicio'] = implode("-", $this->request->query['dataInicio']);
			
			$this->request->query['dataFim'] = explode('/',$this->request->query['dataFim']);
			$this->request->query['dataFim'] = array_reverse($this->request->query['dataFim']);
			$this->request->query['dataFim'] = implode("-", $this->request->query['dataFim']);
				
			$condicoes['created >='] = $this->request->query['dataInicio'].' 00:00:00';
			$condicoes['created <='] = $this->request->query['dataFim'].' 23:59:59';
		} 
		
		if (isset($this->request->query['prioridade']) && $this->request->query['prioridade'] != ''){
			$condicoes['prioridade ='] = $this->request->query['prioridade'];
		} 
		
		//$query = $this->Atendimentos->query('SELECT prioridade, count(id) FROM `atendimentos` where status = 'a' group by prioridade ');
		$resultado = $this->Atendimentos->find()
			->select([
				'prioridade',
				'count' => $this->Atendimentos->find()->func()->count('id'),
			])
			->where([
				$condicoes
			])
			->group('prioridade');
		
		$this->set(compact('resultado'));
		
	}
	
	public function medicamentos(){
		
		$this->loadModel('AtendimentosMedicamentos');
		
		$condicoes = [];
		
		if (isset($this->request->query['dataInicio']) && $this->request->query['dataInicio'] != '' &&
			isset($this->request->query['dataFim']) && $this->request->query['dataFim'] != ''){
			
			$this->request->query['dataInicio'] = explode('/',$this->request->query['dataInicio']);
			$this->request->query['dataInicio'] = array_reverse($this->request->query['dataInicio']);
			$this->request->query['dataInicio'] = implode("-", $this->request->query['dataInicio']);
			
			$this->request->query['dataFim'] = explode('/',$this->request->query['dataFim']);
			$this->request->query['dataFim'] = array_reverse($this->request->query['dataFim']);
			$this->request->query['dataFim'] = implode("-", $this->request->query['dataFim']);
				
			$condicoes['created >='] = $this->request->query['dataInicio'].' 00:00:00';
			$condicoes['created <='] = $this->request->query['dataFim'].' 23:59:59';
		} 
		
		//SELECT m.nome, count(m.id) as total FROM `atendimentos_medicamentos` as am inner join medicamentos as m where am.medicamentos_id = m.id group by medicamentos_id order by count(m.id) Desc 
		$resultado = $this->AtendimentosMedicamentos->find()
			->select([
				'Medicamentos.nome',
				'count' => $this->AtendimentosMedicamentos->find()->func()->count('AtendimentosMedicamentos.id'),
			])
			->where([
				$condicoes
			])
			->contain('Medicamentos')
			->group('AtendimentosMedicamentos.medicamentos_id');
		
		$this->set(compact('resultado'));

	}
}
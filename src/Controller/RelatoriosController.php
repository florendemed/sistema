<?php
namespace App\Controller;

use App\Controller\AppController;

class RelatoriosController extends AppController{
	
	public function index(){
		
	}
	
	public function status_atendimento(){
		
		$this->loadModel('Atendimentos');
		$this->loadModel('Atendimentos_status');
		
		$condicoes = [];
		
		$atendimentos_status = $this->Atendimentos_status->find('list', ['keyField' => 'id', 'valueField' => 'nome']);
		$atendimentos_status = $atendimentos_status->toArray();
		
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
				
			$condicoes['AtendimentosMedicamentos.created >='] = $this->request->query['dataInicio'].' 00:00:00';
			$condicoes['AtendimentosMedicamentos.created <='] = $this->request->query['dataFim'].' 23:59:59';
			
			$this->request->query['dataInicio'] = explode('-',$this->request->query['dataInicio']);
			$this->request->query['dataInicio'] = array_reverse($this->request->query['dataInicio']);
			$this->request->query['dataInicio'] = implode("/", $this->request->query['dataInicio']);
			
			$this->request->query['dataFim'] = explode('-',$this->request->query['dataFim']);
			$this->request->query['dataFim'] = array_reverse($this->request->query['dataFim']);
			$this->request->query['dataFim'] = implode("/", $this->request->query['dataFim']);
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
			//->order([$this->AtendimentosMedicamentos->find()->func()->count('AtendimentosMedicamentos.id') => 'DESC']);
		
		$this->set(compact('resultado'));

	}
	
	public function exames(){
		
		$this->loadModel('AtendimentosExames');
		
		$condicoes = [];
		
		if (isset($this->request->query['dataInicio']) && $this->request->query['dataInicio'] != '' &&
			isset($this->request->query['dataFim']) && $this->request->query['dataFim'] != ''){
			
			$this->request->query['dataInicio'] = explode('/',$this->request->query['dataInicio']);
			$this->request->query['dataInicio'] = array_reverse($this->request->query['dataInicio']);
			$this->request->query['dataInicio'] = implode("-", $this->request->query['dataInicio']);
			
			$this->request->query['dataFim'] = explode('/',$this->request->query['dataFim']);
			$this->request->query['dataFim'] = array_reverse($this->request->query['dataFim']);
			$this->request->query['dataFim'] = implode("-", $this->request->query['dataFim']);
				
			$condicoes['AtendimentosExames.created >='] = $this->request->query['dataInicio'].' 00:00:00';
			$condicoes['AtendimentosExames.created <='] = $this->request->query['dataFim'].' 23:59:59';
			
			$this->request->query['dataInicio'] = explode('-',$this->request->query['dataInicio']);
			$this->request->query['dataInicio'] = array_reverse($this->request->query['dataInicio']);
			$this->request->query['dataInicio'] = implode("/", $this->request->query['dataInicio']);
			
			$this->request->query['dataFim'] = explode('-',$this->request->query['dataFim']);
			$this->request->query['dataFim'] = array_reverse($this->request->query['dataFim']);
			$this->request->query['dataFim'] = implode("/", $this->request->query['dataFim']);
		} 
		
		//SELECT ae.exames_id, e.nome, count(ae.id) as total FROM atendimentos_exames as ae join exames as e where ae.exames_id = e.id group by exames_id 
		$resultado = $this->AtendimentosExames->find()
			->select([
				'Exames.nome',
				'count' => $this->AtendimentosExames->find()->func()->count('AtendimentosExames.id'),
			])
			->where([
				$condicoes
			])
			->contain('Exames')
			->group('AtendimentosExames.exames_id');
		
		$this->set(compact('resultado'));

	}
	
	public function doencas(){
		
		$this->loadModel('AtendimentosDoencas');
		
		$condicoes = [];
		
		if (isset($this->request->query['dataInicio']) && $this->request->query['dataInicio'] != '' &&
			isset($this->request->query['dataFim']) && $this->request->query['dataFim'] != ''){
			
			$this->request->query['dataInicio'] = explode('/',$this->request->query['dataInicio']);
			$this->request->query['dataInicio'] = array_reverse($this->request->query['dataInicio']);
			$this->request->query['dataInicio'] = implode("-", $this->request->query['dataInicio']);
			
			$this->request->query['dataFim'] = explode('/',$this->request->query['dataFim']);
			$this->request->query['dataFim'] = array_reverse($this->request->query['dataFim']);
			$this->request->query['dataFim'] = implode("-", $this->request->query['dataFim']);
				
			$condicoes['AtendimentosDoencas.created >='] = $this->request->query['dataInicio'].' 00:00:00';
			$condicoes['AtendimentosDoencas.created <='] = $this->request->query['dataFim'].' 23:59:59';
			
			$this->request->query['dataInicio'] = explode('-',$this->request->query['dataInicio']);
			$this->request->query['dataInicio'] = array_reverse($this->request->query['dataInicio']);
			$this->request->query['dataInicio'] = implode("/", $this->request->query['dataInicio']);
			
			$this->request->query['dataFim'] = explode('-',$this->request->query['dataFim']);
			$this->request->query['dataFim'] = array_reverse($this->request->query['dataFim']);
			$this->request->query['dataFim'] = implode("/", $this->request->query['dataFim']);
		} 
		
		//SELECT ad.doencas_id, count(ad.id) as total FROM `atendimentos_doencas` as ad join cid_subcategorias as cs WHERE ad.doencas_id = cs.id GROUP BY ad.doencas_id 
		$resultado = $this->AtendimentosDoencas->find()
			->select([
				'Doencas.nome',
				'count' => $this->AtendimentosDoencas->find()->func()->count('AtendimentosDoencas.id'),
			])
			->where([
				$condicoes
			])
			->contain('Doencas')
			->group('AtendimentosDoencas.doencas_id');
		
		$this->set(compact('resultado'));

	}
}
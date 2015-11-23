<?php
namespace App\Controller;

use App\Controller\AppController;

class PaginasController extends AppController{
	
	public function index(){
		
		$this->loadModel('Atendimentos');
		$this->loadModel('Atendimentos_status');
		$this->loadModel('AtendimentosMedicamentos');
		$this->loadModel('AtendimentosDoencas');
		
		$resultadoStatus = $this->Atendimentos->find()
			->select([
				'Situacao.nome',
				'count' => $this->Atendimentos->find()->func()->count('Situacao.id'),
			])
			->contain('Situacao')
			->group('Atendimentos.atendimentos_status_id');
		
		$resultadoMedicamentos = $this->AtendimentosMedicamentos->find()
			->select([
				'Medicamentos.nome',
				'count' => $this->AtendimentosMedicamentos->find()->func()->count('AtendimentosMedicamentos.id'),
			])
			->contain('Medicamentos')
			->group('AtendimentosMedicamentos.medicamentos_id');
			
		$resultadoPrioridade = $this->Atendimentos->find()
			->select([
				'prioridade',
				'count' => $this->Atendimentos->find()->func()->count('id'),
			])
			->group('prioridade');
			
			
			
		$resultadoDoencas = $this->AtendimentosDoencas->find()
			->select([
				'Doencas.nome',
				'count' => $this->AtendimentosDoencas->find()->func()->count('AtendimentosDoencas.id'),
			])
			->contain('Doencas')
			->group('AtendimentosDoencas.doencas_id');

		$this->set(compact('resultadoStatus','atendimentos_status', 'resultadoMedicamentos', 'resultadoPrioridade', 'resultadoDoencas'));
		
    }
}
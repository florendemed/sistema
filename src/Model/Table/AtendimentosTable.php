<?php 
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class AtendimentosTable extends AppTable{
	
	public function initialize(array $config)
    {
		$this->belongsTo('Pacientes', [
			'foreignKey' => 'pacientes_id',
			'joinType' => 'INNER',
		]);
		
		$this->belongsTo('Colaborador', [
			'foreignKey' => 'colaborador_id',
			'joinType' => 'INNER',
			'className' => 'Colaboradores',
		]);
		
		$this->belongsTo('Situacao', [
			'foreignKey' => 'atendimentos_status_id',
			'joinType' => 'INNER',
			'className' => 'AtendimentosStatus',
		]);		
	}
	
}
?>
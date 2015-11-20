<?php 
namespace App\Model\Table;

use Cake\ORM\Table;

class AtendimentosExamesTable extends AppTable{
	
	public function initialize(array $config)
    {
		$this->belongsTo('Exames', [
			'foreignKey' => 'atendimentos_id',
			'joinType' => 'INNER',
			'className' => 'Exames',
		]);
		
		$this->belongsTo('Atendimentos', [
			'foreignKey' => 'atendimentos_id',
			'joinType' => 'INNER',
			'className' => 'Atendimentos',
		]);
	}
	
}
?>
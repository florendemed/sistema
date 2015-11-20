<?php 
namespace App\Model\Table;

use Cake\ORM\Table;

class AtendimentosMedicamentosTable extends AppTable{
	
	public function initialize(array $config)
    {
		$this->belongsTo('Medicamentos', [
			'foreignKey' => 'id',
			'joinType' => 'INNER',
			'className' => 'Medicamentos',
		]);
	}
	
}
?>
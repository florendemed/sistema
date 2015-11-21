<?php 
namespace App\Model\Table;

use Cake\ORM\Table;

class AtendimentosDoencasTable extends AppTable{
	
	public function initialize(array $config)
    {
		$this->belongsTo('Doencas', [
			'foreignKey' => 'doencas_id',
			'joinType' => 'INNER',
			'className' => 'Doencas',
		]);
	}
	
}
?>
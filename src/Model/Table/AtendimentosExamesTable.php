<?php 
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class AtendimentosExamesTable extends AppTable{
	
	public function initialize(array $config)
    {
		$this->belongsTo('Exames', [
			'foreignKey' => 'exames_id',
			'joinType' => 'INNER',
			'className' => 'Exames',
		]);
	}
	
}
?>
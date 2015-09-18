<?php 
namespace App\Model\Table;

use Cake\ORM\Table;

class PermissoesTable extends AppTable{

	public function initialize(array $config)
    {
		$this->belongsTo('PermissaoPai', [
			'foreignKey' => 'permissao_id',
			'joinType' => 'LEFT',
			'className' => 'Permissoes', 
			'joinTable' => 'permissoes',
		]);
	}

}
?>
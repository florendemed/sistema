<?php 
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class DoencasTable extends AppTable{

	public function initialize(array $config){
		
		$this->table('cid_subcategorias');
		
	}

}
?>
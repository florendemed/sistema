<?php 
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class PacientesTable extends Table{
	
	public function validationDefault(Validator $validator) {
		$validator 
			->requirePresence('nome', 'create')
			->notEmpty('nome', 'nome inválido')
			->add('email', 'e-mail inválido', ['rule' => 'email'])
			->allowEmpty('email');
	 
		return $validator;
	}
}
?>
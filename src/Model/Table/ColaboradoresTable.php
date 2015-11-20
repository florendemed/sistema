<?php 
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class ColaboradoresTable extends AppTable{
	
	public function validationDefault(Validator $validator) {
		
		$validator 
			->requirePresence('nome', 'create')
			->notEmpty('nome', 'nome inválido')
			->requirePresence('cpf', 'create')
			->notEmpty('cpf', 'cpf inválido')
			->requirePresence('senha', 'create')
			->notEmpty('senha', 'senha inválida')
			->add('email', 'email', ['rule' => 'email', 'message' => 'e-mail inválido'])
			->allowEmpty('email')
			//->add('data_nascimento', 'data_nascimento', ['rule' => 'date', 'message' => 'data de nascimento inválida'])
			->allowEmpty('data_nascimento');
	 
		return $validator;

	}
	
}
?>
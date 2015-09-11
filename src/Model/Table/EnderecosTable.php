<?php 
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class EnderecosTable extends AppTable{
	
	public function initialize(array $config)
    {
        $this->belongsTo('Pacientes', [
            'foreignKey' => 'paciente_id',
            'joinType' => 'INNER',
        ]);
		
		$this->belongsTo('Colaboradores', [
            'foreignKey' => 'colaborador_id',
            'joinType' => 'INNER',
        ]);
    }
	
}
?>
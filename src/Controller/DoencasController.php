<?php
namespace App\Controller;

use App\Controller\AppController;

class DoencasController extends AppController{
	
	public $helpers = [
		'Paginator'
	];
	
	public $paginate = [
        'limit' => 10
    ];
	
	public function index(){
		
		$condicoes = [];
		
		if (!empty($this->request->query)){
			
			if ($this->request->query['nome'] != ''){
				$condicoes['nome LIKE'] = '%'.$this->request->query['nome'].'%';
			} 

		}
			
		$this->paginate = [
			'conditions' => $condicoes
		];		
		$pacientes = $this->paginate($this->Pacientes);
		$this->set(compact('pacientes'));
    }
	
	public function importar(){
		
    }

}
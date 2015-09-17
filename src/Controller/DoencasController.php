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
		$doencas = $this->paginate($this->Doencas);
		$this->set(compact('doencas'));
    }
	
	public function importar(){
		
		$xml = simplexml_load_file('C:\xampp\htdocs\CID10.xml');
		
		foreach($xml->capitulo as $capitulo) {
			
		}
		
		/*foreach($xml -> capitulo as $capitulo){ //faz o loop nas tag com o nome "item"
			//exibe o valor das tags que estão dentro da tag "item"
			//utilizamos a função "utf8_decode" para exibir os caracteres corretamente
			echo "<strong>Subcategoria:</strong> ".utf8_decode($capitulo -> subcategoria)."<br />";
		}*/
	}

}
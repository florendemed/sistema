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
		
		//carregando XML do CID10
		$xml = simplexml_load_file('C:\xampp2\htdocs\CID10XML\CID10.xml');
		echo 'Capitulo 1, grupo 1, categoria 1...<br>';
		echo $xml->capitulo[0]->grupo[0]->categoria[0]->nome.'<br>';
		echo $xml->capitulo[0]->grupo[0]->categoria[0]['codcat'].'<br>';//Imprimindo dentro de capitulo>grupo>categoria[indice da categoria][codigo da categoria]
		
		echo $xml->capitulo[0]->grupo[0]->categoria[1]->nome.'<br>';
		echo $xml->capitulo[0]->grupo[0]->categoria[1]['codcat'].'<br>';
		
		echo $xml->capitulo[0]->grupo[0]->categoria[2]->nome.'<br>';
		echo $xml->capitulo[0]->grupo[0]->categoria[2]['codcat'].'<br>';
		echo '-----------------------------------------------------------<br>';
		echo 'Capitulo 2, grupo 1, categoria 2<br>';
		echo $xml->capitulo[1]->grupo[0]->categoria[0]->nome.'<br>';
		echo $xml->capitulo[1]->grupo[2]->categoria[0]['codcat'].'<br>';
		/*
		$aux = 0;
		while($aux =! null){
			$aux = $xml->capitulo['numcap'];
			echo $aux;
		}*/
		
		
		
    }

}
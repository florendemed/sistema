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
		
		$xml = simplexml_load_file('C:\xampp2\htdocs\CID10XML\CID10.xml')or die("Erro! Não é possivel abrir XML!");
		/*
		echo '<font color=blue><b>Capitulo 1, grupo 1, categoria [1-]</b></font><br>';
		echo $xml->capitulo[0]->grupo[0]->categoria[0]['codcat'].'--';//Imprimindo dentro de capitulo>grupo>categoria[indice do array categoria][codigo da categoria]
		echo $xml->capitulo[0]->grupo[0]->categoria[0]->nome.'<br>';
		
		echo $xml->capitulo[0]->grupo[0]->categoria[1]['codcat'];
		echo $xml->capitulo[0]->grupo[0]->categoria[1]->nome.'<br>';
		
		echo $xml->capitulo[0]->grupo[0]->categoria[2]['codcat'].'--';
		echo $xml->capitulo[0]->grupo[0]->categoria[2]->nome.'<br>';
		
		echo $xml->capitulo[0]->grupo[0]->categoria[3]['codcat'].'--';
		echo $xml->capitulo[0]->grupo[0]->categoria[3]->nome.'<br>';
	
		echo $xml->capitulo[0]->grupo[0]->categoria[4]['codcat'].'--';
		echo $xml->capitulo[0]->grupo[0]->categoria[4]->nome.'<br>';
	
		echo $xml->capitulo[0]->grupo[0]->categoria[5]['codcat'].'--';
		echo $xml->capitulo[0]->grupo[0]->categoria[5]->nome.'<br>';
		echo '-----------------------------------------------------------<br>';
		echo 'Capitulo 2, grupo 1, categoria 1<br>';
		echo $xml->capitulo[1]->grupo[2]->categoria[0]['codcat'].'--';
		echo $xml->capitulo[1]->grupo[0]->categoria[0]->nome.'<br>';
		
		*/
		/*
		for($aux=0; $aux<20; $aux++){
			echo $xml->capitulo[0]->grupo[0]->categoria[$aux]['codcat'];
			echo $xml->capitulo[0]->grupo[0]->categoria[$aux]->nome.'<br>';
		}
		echo $xml->capitulo;
		$ncapitulo = 21;
		$aux = 0;
		while($ncapitulo >= $aux){
			$xml->capitulo[$aux].'<br>';
			echo 'Numero do capitulo: '.$aux.'<br>';
			$aux++;
			
		}
		*/
		
		foreach($xml->capitulo[0]->grupo[0] as $xml){
			echo $xml->nome.'<br>';
		}
		foreach($xml->capitulo[0]->grupo[1] as $xml){
			echo $xml->nome.'<br>';
			echo $xml->nome50.'<br>';
		}
		echo $xml->capitulo[0]->grupo[1]->categoria->nome.'<br>';
		
		
		
		
    }

}
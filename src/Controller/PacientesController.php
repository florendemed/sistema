<?php
namespace App\Controller;

use App\Controller\AppController;

class PacientesController extends AppController{
	public function index(){

    }
	
	public function editar(){
		
    }
	
	public function adicionar($render = 'adicionar'){
		
		if ($render != 'adicionar') {
			$this->layout = "ajax";
			$this->render($render);	
			
		}
    }
	
	public function deletar(){
		
    }
}
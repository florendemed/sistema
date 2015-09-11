<?php
namespace App\Controller;

use App\Controller\AppController;

class EnderecosController extends AppController{

	public function cep($cep){
	
		$this->render(false);
		pr($this->busca_cep($cep));
	
    }

}
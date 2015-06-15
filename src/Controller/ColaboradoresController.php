<?php
namespace App\Controller;

use App\Controller\AppController;

class ColaboradoresController extends AppController{
	public function index(){

    }
	
	public function login(){
		$this->layout = 'login';
		$this->set('title', 'Login');
    }
	
	public function editar(){
		
    }
	
	public function adicionar(){
		
    }
	
	public function deletar(){
		
    }
}
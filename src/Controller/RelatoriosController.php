<?php
namespace App\Controller;

use App\Controller\AppController;

class RelatoriosController extends AppController{
	
	public function prioridade(){
		
		$this->loadModel('Atendimentos');
		$this->loadModel('Atendimentos_status');
		
		$query = $this->Atendimentos->query('SELECT s.nome as Status, COUNT(*) as Total FROM atendimentos as a inner join atendimentos_status as s where a.status = "a" and a.atendimentos_status_id = s.id GROUP BY a.atendimentos_status_id ');
		
		$query = $query->toArray();
		pr($query);
		exit();
		$this->set(compact('query'));

    }
}
<?php
namespace App\Controller;

use App\Controller\AppController;

class MedicamentosController extends AppController{
	
	public $helpers = [
		'Paginator'
	];
	
	public $paginate = [
        'limit' => 10
    ];
	
	public function inserir(){
		if ($this->request->is('post')) {
			$medicamento = $this->Medicamentos->newEntity($this->request->data);
			$medicamento = $this->Medicamentos->save($medicamento);
			$this->response->body($medicamento->id);
			return $this->response;
		}
    }
	
	public function index(){
		
		$condicoes = [];
		
		if (!empty($this->request->query)){
			
			if (isset($this->request->query['nome']) && $this->request->query['nome'] != ''){
				$condicoes['nome LIKE'] = '%'.$this->request->query['nome'].'%';
			} 

		}
			
		$this->paginate = [
			'conditions' => $condicoes,
			'order' => array(
				'Medicamentos.id' => 'ASC'
			),
		];		
		$medicamentos = $this->paginate($this->Medicamentos);
		$this->set(compact('medicamentos'));
    }
	
	public function adicionar(){
		
		if ($this->request->is('post')) {
			
			$medicamento = $this->Medicamentos->newEntity($this->request->data);
			
			if ($this->Medicamentos->save($medicamento)) {
				
				$this->Flash->success(__('Registro inserido com sucesso.'));
				return $this->redirect('/medicamentos/index');
			}
			$this->Flash->error(__('Não foi possível salvar o registro.'));
		}
		$medicamento = $this->Medicamentos->newEntity();
		$this->set(compact('medicamento'));
		
    }
	
	public function editar($id){

		$medicamento = $this->Medicamentos->get($id);
		
		//Dados postados
		if ($this->request->is('put')) {
			
			$medicamento = $this->Medicamentos->patchEntity($medicamento, $this->request->data);

			if ($medicamento['status'] == '0'){
				$medicamento['status'] = 'i';
			}
			
			if ($this->Medicamentos->save($medicamento)) {
				
				$this->Flash->success(__('Registro alterado com sucesso.'));
				return $this->redirect(['action' => 'index']);

			}
			$this->Flash->error(__('Não foi possível salvar o registro.'));
		} 
		
		$this->set(compact('medicamento'));

    }
	
	public function excluir($id){
		
		$this->autoRender = false;
		
		if ($id != null) {
			$medicamento = $this->Medicamentos->get($id);
			$medicamento->status = 'd';
			$this->Medicamentos->save($medicamento);
			$this->Flash->success('Registro removido com sucesso.');
		} else {
			$this->Flash->error('Não foi possível excluir o registro.');
		}
		
		return $this->redirect('/medicamentos/index');
		
    }
	
	public function buscar($limit=30){
		$this->layout 		= 'ajax';
		$this->autoRender	= false;
		
		$busca = $this->request->query['busca'];
		
		$medicamento = $this->Medicamentos->find('list', [
			'conditions' => [
				'Medicamentos.nome LIKE' => '%'.$busca.'%',
			],
			'limit' => $limit,
			'keyField' => 'id', 
			'valueField' => 'nome',
		])->hydrate(false);
		
		
		
		if ( $medicamento->count() > 0 ) {
			$retorno	= [];
			foreach ( $medicamento as $m_id => $m_nome ) {
				$item['value']	= $m_id;
				$item['label']	= $m_nome;
				$retorno[]	= $item;
			}
		}

		$json = json_encode($retorno);
		//if ( $this->request->is('requested') ) {
			$this->response->body($json);
			return $this->response;
		//}
	}

}
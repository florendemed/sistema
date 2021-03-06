<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Controller\EnderecosController;

class ColaboradoresController extends AppController{
	
	public $helpers = [
		'Paginator'
	];
	
	public $paginate = [
        'limit' => 10,
    ];
	
	public function index(){
		$condicoes = [];
		
		if (!empty($this->request->query)){
			
			if (isset($this->request->query['nome']) && $this->request->query['nome'] != ''){
				$condicoes['nome LIKE'] = '%'.$this->request->query['nome'].'%';
			} 

			if (isset($this->request->query['cpf']) && $this->request->query['cpf'] != ''){
				$condicoes['cpf LIKE'] = '%'.$this->request->query['cpf'].'%';
			} 

		}
			
		$this->paginate = [
			'conditions' => $condicoes,
			'order' => array(
				'Colaboradores.id' => 'DESC'
			),
		];		
		$colaboradores = $this->paginate($this->Colaboradores);
		$this->set(compact('colaboradores'));

    }
	
	public function login(){
		$this->layout = 'login';
		$this->set('title', 'Entrar');
		
		if ($this->request->is('post')) {			
					
			$senha = $this->encripta($this->request->data['senha']);

			$colaborador = $this->Colaboradores->find('all',[
				'conditions' => [
					'Colaboradores.cpf' => $this->request->data['cpf'],
					'Colaboradores.senha' => $senha,
					'Colaboradores.status' => 'a',
				]
			]);
			
			if ( $colaborador->count() == '0'){
				$this->Flash->error(__('Usuário ou senha inválidos.'));
				$this->request->data['senha'] = '';
			} else {
				$colaborador	= $colaborador->toArray();
				$this->request->session()->write('logado_id', $colaborador['0']->id);

				return $this->redirect('/atendimentos/index');
			}
		}
    }
	
	public function esqueci() {
		$this->layout = 'login';
		$this->set('title', 'Esqueci minha senha');
	}
	
	public function adicionar(){
		
		$this->loadModel('Enderecos');
		$this->loadModel('Telefones');
		$this->loadModel('Grupos');
		$this->loadModel('GruposColaboradores');
		
		$grupos = $this->Grupos->find('all');
		$grupos = $grupos->toArray();
		
		$colaborador = $this->Colaboradores->newEntity();
		
		if ($this->request->is('post')) {

			$colaborador 	= $this->Colaboradores->patchEntity($colaborador, $this->request->data);
			
			if ( $this->request->data['senha'] != $this->request->data['senha_repetir']) {
				
				$colaborador->errors(['senha' => 'Confirme sua senha corretamente']); 
				$colaborador->errors(['senha_repetir' => 'Confirme sua senha corretamente']); 
				$this->request->data['senha'] = '';
				$this->request->data['senha_repetir'] = '';
				
			} else {

				$colaborador->senha = $this->encripta($this->request->data['senha']);
			}

			if ($this->Colaboradores->save($colaborador)) {
				
				$this->request->data['endereco']['colaborador_id']		= $colaborador->id;
				$this->request->data['telefone']['colaborador_id']		= $colaborador->id;
				
				$endereco 	= $this->Enderecos->newEntity($this->request->data['endereco']);
				$this->Enderecos->save($endereco);

				foreach($this->request->data['grupo']['nome'] as $item){

					if ( $item != '0' ){

						$salvarGruposColaboradores['colaboradores_id'] 	= $colaborador['id'];
						$salvarGruposColaboradores['grupos_id'] = $item;
					
						$GruposColaboradores = $this->GruposColaboradores->newEntity($salvarGruposColaboradores);
						$this->GruposColaboradores->save($GruposColaboradores);
					}
					
				}
				
				for( $i = 1; $i <= 3; $i++ ){
					$telefone = $this->request->data['telefone'];
					
					if ( $telefone['numero'.$i] != '' ){
						
						$salvarTelefone['tipo'] = $telefone['tipo'.$i];
						$salvarTelefone['numero'] = $telefone['numero'.$i];
						$salvarTelefone['colaborador_id'] = $colaborador->id;
						
						$telefone 		= $this->Telefones->newEntity($salvarTelefone);
						$this->Telefones->save($telefone);
						
					}

				}

				$this->Flash->success(__('Registro inserido com sucesso.'));
				return $this->redirect('/colaboradores/index');
			}
			$this->Flash->error(__('Não foi possível salvar o registro.'));
		}
		$this->set(compact('colaborador', 'grupos', 'GruposColaboradores'));
    }
	
	public function editar($id){

		$this->loadModel('Enderecos');
		$this->loadModel('Telefones');
		$this->loadModel('Grupos');
		$this->loadModel('GruposColaboradores');
		
		$grupos = $this->Grupos->find('all');
		$grupos = $grupos->toArray();
		
		$gruposColaboradores = $this->GruposColaboradores->findAllByColaboradoresId($id);
		$selecionados = $gruposColaboradores->toArray();
		
		$checados = array();
		
		foreach ($selecionados as $s){
			$checados[] = $s['grupos_id'];
		}
		
		$colaborador = $this->Colaboradores->get($id);
		
		//Dados postados
		if ($this->request->is('put')) {
			
			if ( $this->request->data['status'] == '0' ){
				$this->request->data['status'] = 'i';				
			}
			
			$erros = [];
			
			if ($this->request->data['senha'] == ''){
				unset($this->request->data['senha']);
			} else {
				if ( $this->request->data['senha'] != $this->request->data['senha_repetir']) {
					$erros = ['senha' => 'Confirme sua senha corretamente', 'senha_repetir' => 'Confirme sua senha corretamente']; 
					$this->request->data['senha'] = '';
					$this->request->data['senha_repetir'] = '';
				} else {
					$this->request->data['senha'] = $this->encripta($this->request->data['senha']);
				}
			}
			
			$colaborador = $this->Colaboradores->patchEntity($colaborador, $this->request->data);
			
			$colaborador->errors($erros); 
			
			if ($this->Colaboradores->save($colaborador)) {
				
				//pegar idPaciente
				$this->request->data['endereco']['colaborador_id']	= $colaborador->id;
				$this->request->data['telefone']['colaborador_id']	= $colaborador->id;
				
				//Deleta endereço e salva novamente
				$this->Enderecos->deleteAll(['colaborador_id' => $id]);
				$endereco = $this->Enderecos->newEntity($this->request->data['endereco']);
				$this->Enderecos->save($endereco);
				
				$this->Telefones->deleteAll(['colaborador_id' => $id]);
				$this->GruposColaboradores->deleteAll(['colaboradores_id' => $id]);
				
				for( $i = 1; $i <= 3; $i++ ){
					$telefone = $this->request->data['telefone'];
					if ( $telefone['numero'.$i] != '' ){
						$salvarTelefone['tipo'] = $telefone['tipo'.$i];
						$salvarTelefone['numero'] = $telefone['numero'.$i];
						$salvarTelefone['colaborador_id'] = $colaborador->id;
						$telefone = $this->Telefones->newEntity($salvarTelefone);
						$this->Telefones->save($telefone);
					}
				}
				foreach($this->request->data['grupo']['nome'] as $item){
					if ( $item != '0' ){
						$salvarGruposColaboradores['colaboradores_id'] 	= $colaborador['id'];
						$salvarGruposColaboradores['grupos_id'] = $item;
						$GruposColaboradores = $this->GruposColaboradores->newEntity($salvarGruposColaboradores);
						$this->GruposColaboradores->save($GruposColaboradores);
					}
				}
				$this->Flash->success(__('Registro alterado com sucesso.'));
				return $this->redirect(['action' => 'index']);
			}
			$this->Flash->error(__('Não foi possível salvar o registro.'));
		} 
		
		//Dados exibidos
		$endereco = $this->Enderecos->findByColaboradorId($id);
		$telefone = $this->Telefones->findAllByColaboradorId($id);
				
		$endereco	= $endereco->toArray();
		
		if ( $endereco != null){
			$endereco	= $endereco['0'];
		}
		
		$telefone 	= $telefone->toArray();
		$colaborador['senha'] = '';
		$colaborador['senha_repetir'] = '';
		
		if ( $colaborador->data_nascimento != null){
			$this->request->data['data_nascimento']	= $colaborador->data_nascimento->i18nFormat('dd/MM/YYYY');
		}
	
		$this->set(compact('colaborador', 'endereco', 'telefone', 'grupos', 'GruposColaboradores', 'checados' ));

    }
	
	public function excluir($id){
		
		$this->autoRender = false;
		
		if ($id != null) {
			$colaborador = $this->Colaboradores->get($id);
			$colaborador->status = 'd';
			$this->Colaboradores->save($colaborador);
			$this->Flash->success('Registro removido com sucesso.');
		} else {
			$this->Flash->error('Não foi possível excluir o registro.');
		}
		
		return $this->redirect('/colaboradores/index');
		
    }
	
	public function logout(){
		
		$this->autoRender = false;
		$this->request->session()->destroy();
		
		return $this->redirect('/colaboradores/login');

    }
}
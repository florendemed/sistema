<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Flash');
		
		//Array Profissões
		$combo_profissoes = array(
            '' => '',
            'Administrador' => 'Administrador',
            'Administrador de Redes' => 'Administrador de Redes',
            'Advogado' => 'Advogado',
            'Agricultor' => 'Agricultor',
            'Agrônomo' => 'Agrônomo',
            'Alfaiate' => 'Alfaiate',
            'Analista de Sistemas' => 'Analista de Sistemas',
            'Aposentado' => 'Aposentado',
            'Arquiteto' => 'Arquiteto',
            'Assistente Social' => 'Assistente Social',
            'Atleta' => 'Atleta',
            'Ator' => 'Ator',
            'Autônomo' => 'Autônomo',
            'Aux. de Escritório' => 'Aux. de Escritório',
            'Bancário' => 'Bancário',
            'Bibliotecário' => 'Bibliotecário',
            'Balconista' => 'Balconista',
            'Biólogo' => 'Biólogo',
            'Cantor' => 'Cantor',
            'Cientista' => 'Cientista',
            'Comandante' => 'Comandante',
            'Comerciante' => 'Comerciante',
            'Comissário' => 'Comissário',
            'Comprador' => 'Comprador',
            'Contador' => 'Contador',
            'Decorador' => 'Decorador',
            'Demonstrador' => 'Demonstrador',
            'Dentista' => 'Dentista',
            'Desenhista' => 'Desenhista',
            'Designer' => 'Designer',
            'Despachante' => 'Despachante',
            'Diplomata' => 'Diplomata',
            'Diretor' => 'Diretor',
            'Economista' => 'Economista',
            'Editor' => 'Editor',
            'Eletricista' => 'Eletricista',
            'Empresário' => 'Empresário',
            'Enfermeiro' => 'Enfermeiro',
            'Engenheiro Civil' => 'Engenheiro Civil',
            'Engenheiro da Computação' => 'Engenheiro da Computação',
            'Engenheiro Eletricista' => 'Engenheiro Eletricista',
            'Engenheiro Mecânico' => 'Engenheiro Mecânico',
            'Estudante' => 'Estudante',
            'Farmacêutico' => 'Farmacêutico',
            'Fiscal' => 'Fiscal',
            'Físico' => 'Físico',
            'Fisioterapeuta' => 'Fisioterapeuta',
            'Func. Público' => 'Func. Público',
            'Gerente' => 'Gerente',
            'Gráfico' => 'Gráfico',
            'Industrial' => 'Industrial',
            'Jornalista' => 'Jornalista',
            'Juiz de Direito' => 'Juiz de Direito',
            'Locutor' => 'Locutor',
            'Marketing' => 'Marketing',
            'Mecânico' => 'Mecânico',
            'Médico' => 'Médico',
            'Metalúgico' => 'Metalúgico',
            'Microempresário' => 'Microempresário',
            'Militar' => 'Militar',
            'Modelo' => 'Modelo',
            'Motorista' => 'Motorista',
            'Músico' => 'Músico',
            'Nutricionista' => 'Nutricionista',
            'Profissional' => 'Profissional',
            'Pecuarista' => 'Pecuarista',
            'Pedagogo' => 'Pedagogo',
            'Piloto' => 'Piloto',
            'Pintor' => 'Pintor',
            'Procurador' => 'Procurador',
            'Professor' => 'Professor',
            'Projetista' => 'Projetista',
            'Protético' => 'Protético',
            'Psicólogo' => 'Psicólogo',
            'Publicitário' => 'Publicitário',
            'Químico' => 'Químico',
            'Recepcionista' => 'Recepcionista',
            'Relações Públicas' => 'Relações Públicas',
            'Repres. Comercial' => 'Repres. Comercial',
            'Secretária' => 'Secretária',
            'Sociólogo' => 'Sociólogo',
            'Técnico em Eletrônica' => 'Técnico em Eletrônica',
            'Técnico em Informática' => 'Técnico em Informática',
            'Terapeuta' => 'Terapeuta',
            'Tradutor' => 'Tradutor',
            'Turismo' => 'Turismo',
            'Vendedor' => 'Vendedor',
            'Veterinário' => 'Veterinário',
            'Zelador' => 'Zelador',
            'Outros' => 'Outros',
        );
        $this->set('combo_profissoes', $combo_profissoes);
		
		//array de estado civil
        $combo_estadocivil = array(
            '' 					=> '',
            'Solteiro(a)' 		=> 'Solteiro(a)',
            'Casado(a)' 		=> 'Casado(a)',
            'Divorciado(a)' 	=> 'Divorciado(a)',
            'Viúvo(a)' 			=> 'Viúvo(a)',
        );
        $this->set('combo_estadocivil', $combo_estadocivil);
		
		//array de escolaridades
        $combo_escolaridades = array(
			'' => '',
            'Ensino primário incompleto' 			=> 'Ensino primário incompleto',
            'Ensino primário completo' 				=> 'Ensino primário completo',
            'Ensino médio incompleto' 				=> 'Ensino médio incompleto',
            'Ensino médio completo' 				=> 'Ensino médio completo',
            'Cursando Faculdade ou Universidade' 	=> 'Cursando Faculdade ou Universidade',
            'Graduado' 								=> 'Graduado',
            'Mestrado' 								=> 'Mestrado',
            'Doutorado' 							=> 'Doutorado',
        );
        $this->set('combo_escolaridades', $combo_escolaridades);
		
		//array de sexo
        $combo_sexo = array(
			'' 	=> '',
            'F' => 'Feminino',
            'M' => 'Masculino',
        );
        $this->set('combo_sexo', $combo_sexo);
		
		//array de sexo
        $combo_tipo_sanguinio = array(
			'' 		=> '',
            'O+' 	=> 'O+',
            'A+' 	=> 'A+',
            'B+' 	=> 'B+',
            'AB+' 	=> 'AB+',
            'O-' 	=> 'O-',
            'B-' 	=> 'B-',
            'AB-' 	=> 'AB-',
        );
        $this->set('combo_tipo_sanguinio', $combo_tipo_sanguinio);
		
		//array de raça
		$combo_raca = array(
			'' 				=> '',	
            'Branco' 		=> 'Branco',
            'Caucasiano'	=> 'Caucasiano',
            'Amarela' 		=> 'Amarela',
            'Negro' 		=> 'Negro',
            'Indígena' 		=> 'Indígena',
            'Pardo' 		=> 'Pardo',
            'Mulato' 		=> 'Mulato',
            'Caboclo' 		=> 'Caboclo',
            'Cafuzo' 		=> 'Cafuzo',
        );
        $this->set('combo_raca', $combo_raca);
		
		//array de tipos telefone
		$combo_tipos_telefone = array(
            'residencial' 	=> 'Residencial',
            'comercial'		=> 'Comercial',
            'celular' 		=> 'Celular',
        );
        $this->set('combo_tipos_telefone', $combo_tipos_telefone);
		
		//array de conselho regional
		$combo_conselho_regional = array(
			'' 		=> '',	
            'CRM' 	=> 'CRM',
            'CRP'	=> 'CRP',
            'CRE' 	=> 'CRE',
        );
        $this->set('combo_conselho_regional', $combo_conselho_regional);
		
		//array de prioridades
		$combo_prioridades = array(
			'2'		=> 'Normal',	
            '1' 	=> 'Emergência',
            '3' 	=> 'Baixa',
        );
        $this->set('combo_prioridades', $combo_prioridades);
		
		//array de uso
		$combo_uso = array(
			'1'		=> 'Uso Interno',	
            '2' 	=> 'Uso Externo',
        );
        $this->set('combo_uso', $combo_uso);
		
		//array de intervalo de uso medicamentos receita
		$combo_intervalo = array(
			'1 em 1 hora'		=> '1 em 1 hora',	
            '2 em 2 horas' 	=> '2 em 2 horas',
            '3 em 3 horas' 	=> '3 em 3 horas',
            '4 em 4 horas' 	=> '4 em 4 horas',
            '5 em 5 horas' 	=> '5 em 5 horas',
            '6 em 6 horas' 	=> '6 em 6 horas',
            '7 em 7 horas' 	=> '7 em 7 horas',
            '8 em 8 horas' 	=> '8 em 8 horas',
            '9 em 9 horas' 	=> '9 em 9 horas',
            '10 em 10 horas' 	=> '10 em 10 horas',
            '11 em 11 horas' 	=> '11 em 11 horas',
            '12 em 12 horas' 	=> '12 em 12 horas',
            '24 em 24 horas' 	=> '24 em 24 horas',
        );
        $this->set('combo_intervalo', $combo_intervalo);
		
		//array de status
		$combo_status = array(
			'a'		=> 'Ativo',	
			'i'		=> 'Inativo',	
        );
        $this->set('combo_status', $combo_status);
		
    }
	
	public function beforeFilter(Event $event)
	{
		parent::beforeFilter($event);
		/* controle de acesso - login */
		$this->loadModel('Colaboradores');
		
		if ( $this->request->session()->read('logado_id') != ''){

			if ($this->request->here != '/entrar'){
				
				$logado = $this->Colaboradores->find('all',[
					'conditions' => [
						'Colaboradores.id' => $this->request->session()->read('logado_id')
					]
				])->toArray();
				
				/* aqui nunca cadastrar as rotas e sim o controller/action */
				$excecoes	= [
					'app/busca_cep',
					'colaboradores/login',
					'colaboradores/logout',
					'paginas/index',
				];
				$local	= strtolower($this->request->controller) . '/' . $this->request->action;
				
				/* permissoes */
				$this->loadModel('Permissoes');
				$this->loadModel('GruposPermissoes');
				$this->loadModel('GruposColaboradores');
				$this->loadModel('Grupos');
				
				$permissaoLocal = $this->Permissoes->find('all',[
					'conditions' => [
						'Permissoes.controlador' => $this->request->controller,
						'Permissoes.acao' => $this->request->action,
					]
				]);
				$permissaoLocal = $permissaoLocal->first();
				
				$gruposId = $this->GruposColaboradores->find('all',[
					'conditions' => [
						'GruposColaboradores.colaboradores_id' => $this->request->session()->read('logado_id')
					],
					'fields' => 'GruposColaboradores.grupos_id'
				]);
				
				if ( $gruposId->count() > 0 ){
					$grupos_ids = [];
					foreach ( $gruposId as $grupoId ){
						$grupos_ids[] = $grupoId->grupos_id;
					}
				}else {
					$this->request->session()->destroy();
					$this->Flash->error(__('Você não possui grupo de acesso para utilizar o sistema.'));
					return $this->redirect('/entrar');
				}
				$permissoesId = $this->GruposPermissoes->find('all',[
					'conditions' => [
						'GruposPermissoes.grupos_id IN' => $grupos_ids
					],
					'group' => 'GruposPermissoes.permissoes_id'
				]);
				
				if ( $permissoesId->count() > 0 ){
					$permissoes_ids = [];
					foreach ( $permissoesId as $permissaoId ){
						$permissoes_ids[] = $permissaoId->permissoes_id;
					}
				} 
				$menus	= $this->Permissoes->find('all', [
					'conditions' => [
						'Permissoes.id IN' => $permissoes_ids,
						'Permissoes.menu' => 's',
						'Permissoes.permissao_id' => '0'
					],
					'order' => 'Permissoes.ordem'
				])->hydrate(false)->toArray();
				
				foreach ( $menus as $i => $menu ) {
					//pegar filhos com permissao
					$filhos	= $this->Permissoes->find('all', [
						'conditions' => [
							'Permissoes.id IN' => $permissoes_ids,
							'Permissoes.menu' => 's',
							'Permissoes.permissao_id' => $menu['id']
						],
						'order' => 'Permissoes.ordem'
					])->hydrate(false)->toArray();
					$menus[$i]['filhos']	= $filhos;
				}
				$this->set(compact('menus'));
				if ( !in_array(trim($local), $excecoes) ) {
					if ( !isset($permissaoLocal->id) ) {
						$retornoPermissoes	= 0;
					} else {
						$retornoPermissoes = in_array ( $permissaoLocal->id , $permissoes_ids );
					}
					if ( $retornoPermissoes == 0 || !isset($retornoPermissoes) ){
						$this->Flash->error(__('Você não possui acesso a essa área.'));
						return $this->redirect('/index');
					}
				}
			} else {
				$this->redirect('/index');
			}
		} else {
			if ($this->request->here != '/entrar' && $this->request->here != '/esqueci-minha-senha'){	
				$this->Flash->error(__('É necessário estar logado para acessar esta área.'));
				$this->redirect('/entrar');
			}
		}
		$this->set(compact('logado', 'retornoPermissoes', 'permissoes_ids'));
	}
	
	public function busca_cep($cep){
		$this->autoRender	= false;
		$this->layout		= 'ajax';
		$token				= "98b2a0b65d90b36d138e23fb282a1b3f";
		$url 				= "http://buscacep.k7comunicacao.com.br/cep/$cep/$token";
		$ch					= curl_init();
		curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
		curl_setopt($ch,CURLOPT_URL,$url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$retorno			= curl_exec($ch);
		curl_close($ch);
		$this->response->body($retorno);
	}	

	
}

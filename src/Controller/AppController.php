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

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

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

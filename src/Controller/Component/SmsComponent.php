<?php
namespace App\Controller\Component;

use Cake\Controller\Component;

class SmsComponent extends Component {
	var $login	= 'scheila';
	var $senha	= '141183';
	
	function initialize(array $config) {
		//login
		$url			= "http://app.smsapi.com.br/contas/service.json";
		$dados['acao']		= 'login';
		$dados['usuario']	= $this->login;
		$dados['senha']		= $this->senha;
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $dados);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$response = json_decode(curl_exec($ch), true);
		$this->chave		= $response['retorno']['chave'];
		return $response;
	}
	function startup() {}
	function beforeRender() {}
	function beforeRedirect() {}
	function shutdown() {}

	function enviar($destinos, $texto) {
		if ( !is_array($destinos) )
			$destinos	= array($destinos);
			
		$url			= "http://app.smsapi.com.br/mensagens/service.json";
		$dados['acao']		= 'enviar';
		$dados['destinos']	= json_encode($destinos);
		$dados['texto']		= $texto;
		$dados['chave']		= $this->chave;

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POST, true);
		@curl_setopt($ch, CURLOPT_POSTFIELDS, $dados);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$retorno	= curl_exec($ch);
		$response 	= json_decode($retorno, true);
		return $response;
	}
}
?>

<?php
	/*
	Primeira tentativa
	servidor NuSOAP
	include('lib/nusoap.php');
	$servidor =  new nusoap_server();
	
	$servidor->configureWSDL('urn:Servidor');
	$servidor->wsdl->schemaTargetNamespace = 'urn:Servidor';
	
	function exemplo($nome, $idade){
		return($nome.' -> '.$idade);
	}
	
	$servidor->register(
		'exemplo',
		array('nome' => 'xsd:string'
				'idade' =>'xsd:int' ),
		array('retorno' =>'xsd:string'),
			'urn:Servidor.exemplo',
			'urn:Servidor.exemplo',
			'rpc',
			'encoded',
			'Exemplo de uso de webService em php.'	
	);
	
	// requisição para uso do serviço
$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
$servidor->service($HTTP_RAW_POST_DATA);
*/


// inclusão do arquivo de classes NuSOAP
require_once('lib/nusoap.php');
// criação de uma instância do servidor
$server = new soap_server;
// registro do método
//Descrição do servico
$server->configureWSDL('Provedor de Servicos:Florence Med');
$server->wsdl->schemaTargetNamespace = 'Provedor de Servicos:Florence Med';
$server->register('hello');
// definição do método como uma função do PHP
	function hello($name) {
		return 'Resposta do servidor '.$name;
	}
// requisição para uso do serviço
$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
$server->service($HTTP_RAW_POST_DATA);
?>
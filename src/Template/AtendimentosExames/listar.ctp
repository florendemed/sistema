<?php
if ( $exames->count() == 0 ) {
	?>
	<p class="alert alert-info">Nenhum exame inserido</p>
	<?php
} else {
	
	$listaExames = $exames->toArray();
	
	foreach ( $listaExames as $le){
		
		echo('<p><a href="/AtendimentosExames/excluir/'.$le['exames_id'].'" title="Remover" onclick=""><span class="glyphicon glyphicon-remove"></span></a> '.$le['exame']['nome'].'</p>');
	
	}
	
	

}
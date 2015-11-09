<?php
if ( $medicamentos->count() == 0 ) {
	?>
	<p class="alert alert-info">Nenhum medicamento inserido</p>
	<?php
} else {
	
	$listaMedicamentos = $medicamentos->toArray();
	
	foreach ( $listaMedicamentos as $lm){
		
		if ( $lm['uso'] == 1 ){
			$uso = 'uso interno';
		} else {
			$uso = 'uso externo';			
		}
		
	echo('<p><a href="" title="Remover" onclick=""><span class="glyphicon glyphicon-remove"></span></a> '.$lm['medicamento']['nome'].' - '.$uso.' - Tomar '.$lm['quantidade'].' '.$lm['intervalo'].' por '.$lm['dias'].'</p>');
	
	}
	
	

}
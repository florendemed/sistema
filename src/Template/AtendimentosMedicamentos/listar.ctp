<?php
if ( $medicamentos->count() == 0 ) {
	?>
	<p class="alert alert-info">Nenhum medicamento inserido</p>
	<?php
} else {
	echo $this->Html->scriptBlock("
		$(document).ready(function() {
			$('.remover-medicamento').click(function(){
				var atendimentos_medicamentos_id = $(this).data('id');
				$.ajax({
					url: '/AtendimentosMedicamentos/excluir/' + atendimentos_medicamentos_id + '/" . $this->request->params['pass']['0'] ."',
					async: false,
					success: function(data) {
						$('.panel-medicamentos').load('/AtendimentosMedicamentos/listar/" . $this->request->params['pass']['0'] . "');
					}
				});
			});
		});
	");
	$listaMedicamentos = $medicamentos->toArray();
	
	foreach ( $listaMedicamentos as $lm){
		
		if ( $lm['uso'] == 1 ){
			$uso = 'uso interno';
		} else {
			$uso = 'uso externo';			
		}
		echo('<p><a class="remover-medicamento" href="javascript:void(0);" data-id="' . $lm['id'] . '" title="Remover" onclick=""><span class="glyphicon glyphicon-remove"></span></a> '.mb_strtolower($lm['medicamento']['nome']).' - '.$uso.' - '.$lm['quantidade'].' - '.$lm['intervalo'].' - '.$lm['dias'].'</p>');
	
	}
}
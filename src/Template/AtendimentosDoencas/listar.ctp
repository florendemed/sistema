<?php
if ( $doencas->count() == 0 ) {
	?>
	<p class="alert alert-info">Nenhum diagnóstico inserido</p>
	<?php
} else {
	echo $this->Html->scriptBlock("
		$(document).ready(function() {
			$('.remover-doenca').click(function(){
				var atendimentos_doencas_id = $(this).data('id');
				$.ajax({
					url: '/AtendimentosDoencas/excluir/' + atendimentos_doencas_id + '/" . $this->request->params['pass']['0'] ."',
					async: false,
					success: function(data) {
						$('.panel-doencas').load('/AtendimentosDoencas/listar/" . $this->request->params['pass']['0'] . "');
					}
				});
			});
		});
	");
	$listaDoencas = $doencas->toArray();
	
	foreach ( $listaDoencas as $ld){
		echo('<p><a class="remover-doenca" href="javascript:void(0);" data-id="' . $ld['id'] . '" title="Remover" onclick=""><span class="glyphicon glyphicon-remove"></span></a> '.mb_strtolower($ld['doenca']['nome']).'</p>');
	}
}
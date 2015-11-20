<?php
if ( $exames->count() == 0 ) {
	?>
	<p class="alert alert-info">Nenhum exame inserido</p>
	<?php
} else {
	echo $this->Html->scriptBlock("
		$(document).ready(function() {
			$('.remover-exame').click(function(){
				var atendimentos_exames_id = $(this).data('id');
				$.ajax({
					url: '/AtendimentosExames/excluir/' + atendimentos_exames_id + '/" . $this->request->params['pass']['0'] ."',
					async: false,
					success: function(data) {
						$('.panel-exames').load('/AtendimentosExames/listar/" . $this->request->params['pass']['0'] . "');
					}
				});
			});
		});
	");
	$listaExames = $exames->toArray();
	
	foreach ( $listaExames as $le){
		echo('<p><a class="remover-exame" href="javascript:void(0);" data-id="' . $le['id'] . '" title="Remover" onclick=""><span class="glyphicon glyphicon-remove"></span></a> '.mb_strtolower($le['exame']['nome']).'</p>');
	}
}
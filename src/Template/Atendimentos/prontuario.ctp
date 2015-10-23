<div class="row">
	<div class="col-md-12" id="mensagem_header_default">
		<ul class="breadcrumb">
			<li class="active">Dados / Pacientes</li>
		</ul>
		<ul class="nav nav-tabs">
			<li><a href="/pacientes/adicionar">Editar</a></li>
			<li><a href="/pacientes/index">Listar</a></li>
			<li class="active"><a href="/pacientes/prontuario">Prontuário</a></li>
		</ul>
		
			<div class="row">
			<?php if( count($atendimento) > 0 ) { ?>
				<?php foreach ($atendimento as $at):?>
					<p><?= h($at->created) ?></p>
					<p>Frequencia Cardiaca: <?= h($at->frequencia_cardiaca) ?></p>
					<p>Pressão Arterial: <?= h($at->pressao_arterial) ?></p>
					<p>Temperatura: <?= h($at->temperatura) ?> ºC</p>
					<p>Queixa: <?= h($at->queixa) ?></p>
					<p>Diagnóstico: <?= h($at->diagnostico) ?></p>
					<p>Prescrição: <?= h($at->prescricao) ?></p>
					<p>Anamnese: <?= h($at->anamnese) ?></p>
					<p>Observações: <?= h($at->observacoes) ?></p>
				<?php endforeach; ?>
			<?php } else { ?>
				<p class="alert alert-warning">Nenhum resultado encontrado.</p>
			<?php }?>
			</div>			
			<hr />
			
	</div>
</div>
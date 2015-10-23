<div class="row">
	<div class="col-md-12" id="mensagem_header_default">
		<ul class="breadcrumb">
			<li class="active">Dados / Pacientes</li>
		</ul>
		<ul class="nav nav-tabs">
			<li><a href="/pacientes/editar/">Editar</a></li>
			<li><a href="/pacientes/index">Listar</a></li>
			<li class="active"><a href="/pacientes/prontuario">Prontuário</a></li>
		</ul>
		<div class="row">
			<div class='col-md-12'>
			<?php if( count($atendimento) > 0 ) { ?>
				<ul id='timeline'>
					<?php foreach ($atendimento as $i => $at): ?>
						<li class='work'>
							<input class='radio' id='work<?= $i?>' name='works' type='radio' checked>
							<div class="relative">
								<label for='work<?= $i?>' class='date'>
									<span class='glyphicon glyphicon-calendar'></span> <?= h($at->created) ?><br />
									<span class='medico'>Médico: <?= h($at->colaborador_id) ?></span>
								</label>
								<span class='circle'></span>
							</div>
							<div class='content'>
								<p>
									<i class="fa fa-stethoscope"></i>
									<span class='linha'></span>
									Frequencia Cardiaca: <span><?= h($at->frequencia_cardiaca) ?></span><br />
									Pressão Arterial: <span><?= h($at->pressao_arterial) ?></span><br />
									Temperatura: <span><?= h($at->temperatura) ?> ºC</span><br />
									<span class='linha'></span>
									Anamnese: <span><?= h($at->anamnese) ?></span><br />
									Queixa: <span><?= h($at->queixa) ?></span><br />
									Diagnóstico: <span><?= h($at->diagnostico) ?></span><br />
									Prescrição: <span><?= h($at->prescricao) ?></span><br />
									Observações: <span><?= h($at->observacoes) ?></span>
								</p>
							</div>
						</li>
					<?php  endforeach; ?>
				</ul>
			<?php } else { ?>
					<p class="alert alert-warning">Nenhum resultado encontrado.</p>
			<?php }?>
		</div>	
	</div>
</div>
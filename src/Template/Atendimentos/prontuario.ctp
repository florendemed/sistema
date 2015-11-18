<div class="row">
	<div class="col-md-12" id="mensagem_header_default">
		<ul class="breadcrumb">
			<li class="active">Dados / Pacientes / Prontuário</li>
		</ul>
		<ul class="nav nav-tabs">
			<?php foreach ($paciente as $pc): ?>
				<li><a href="/pacientes/editar/<?= $pc->id; ?>">Editar</a></li>
				<li><a href="/pacientes/index">Listar</a></li>
				<li class="active"><a href="/atendimentos/prontuario/<?= $pc->id; ?>">Prontuário</a></li>
			<?php  endforeach; ?>
		</ul>
		<div class="row">
			<div class="col-md-2 dados">
				<?php foreach ($paciente as $pc): ?>
					<p class="text-center"><img src='/img/sem_foto.png' /></p>
					<p><strong>Nome: </strong><?= $pc->nome ?></p>
					<p><strong>Nascimento: </strong>
					<?php
						$nascimento = substr($pc->data_nascimento, 0, 8);
						echo($nascimento);
					?>
					</p>
					<p><strong>Sexo: </strong>
					<?php
						if( $pc->sexo == 'F'){
							$sexo = "Feminino";
						} else {
							$sexo = "Masculino";
						}
						echo($sexo); 
					?>
					</p>
				<?php  endforeach; ?>
			</div>
			<div class='col-md-10'>
				<?php if( count($atendimento) > 0 ) { ?>
					<ul id='timeline'>
						<?php foreach ($atendimento as $i => $at): ?>
							<li class='work'>
								<input class='radio' id='work<?= $i?>' name='works' type='radio' checked>
								<div class="relative">
									<label for='work<?= $i?>'>
										<span class='glyphicon glyphicon-calendar'></span> <?= $at->created ?><br />
										<span class='medico'>Médico (a): <?= $at->colaborador->nome ?></span>
									</label>
									<span class='circle'></span>
								</div>
								<div class='content'>
									<p>
										<i class="fa fa-stethoscope"></i>
										<span class='linha'></span>
										Frequência Cardiaca: <span><?= $at->frequencia_cardiaca ?></span><br />
										Pressão Arterial: <span><?= $at->pressao_arterial ?></span><br />
										Temperatura: <span><?= $at->temperatura ?> ºC</span><br />
										<span class='linha'></span>
										Anamnese: <span><?= $at->anamnese ?></span><br />
										Queixa: <span><?= $at->queixa ?></span><br />
										Diagnóstico: <span><?= $at->diagnostico ?></span><br />
										Prescrição: <span><?= $at->prescricao ?></span><br />
										Exames: <span><?= $at->prescricao ?></span><br />
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
</div>
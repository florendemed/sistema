<div class="row">
	<div class="col-md-12" id="mensagem_header_default">
		<ul class="breadcrumb">
			<li class="active">Dados / Pacientes / Prontuário</li>
		</ul>
		<ul class="nav nav-tabs">
			<li><a href="/pacientes/editar/<?= $paciente['id']; ?>">Editar</a></li>
			<li><a href="/pacientes/index">Listar</a></li>
			<li class="active"><a href="/atendimentos/prontuario/<?= $paciente['id']; ?>">Prontuário</a></li>
		</ul>
		<div class="row">
			<div class="col-md-2 dados">
				<p class="text-center"><img src='/img/sem_foto.png' /></p>
				<p><strong>Nome: </strong><?= $paciente['nome']; ?></p>
				<p><strong>Nascimento: </strong>
				<?php
					$dataNascimento = substr($paciente['data_nascimento'], 0, 10);
					echo($dataNascimento);
				?>
				</p>
				<p><strong>Idade: </strong>
				<?php
					$dataNascimento = explode('/', $dataNascimento);
				
					$diaNascimento = $dataNascimento[0];
					$mesNascimento = $dataNascimento[1];
					$anoNascimento = $dataNascimento[2];
					
					$anoAtual = date('Y');
					$mesAtual = date('m');
					$diaAtual = date('d');
					
					if ( $mesAtual < $mesNascimento ){
						$idade = ($anoAtual - $anoNascimento) - 1;
						echo($idade.' Anos');
					} else if ( $mesAtual > $mesNascimento ) {
						$idade = $anoAtual - $anoNascimento;
						echo($idade.' Anos');
					} else {
						if ( $diaAtual < $diaNascimento ){
							$idade = ($anoAtual - $anoNascimento) - 1;	
							echo($idade.' Anos');
						} else if ( $diaAtual >= $diaNascimento ) {
							$idade = $anoAtual - $anoNascimento;
							echo($idade.' Anos');
						}
					}
				?>
				</p>
				<p><strong>Sexo: </strong>
				<?php
					if( $paciente['sexo'] == 'F'){
						$sexo = "Feminino";
					} else {
						$sexo = "Masculino";
					}
					echo($sexo); 
				?>
				</p>
			</div>
			<div class='col-md-10'>
				<?php if( count($dadosProntuario) > 0 ) { ?>
					<ul id='timeline'>
						<?php foreach ($dadosProntuario as $i => $dp): ?>
							<li class='work'>
								<input class='radio' id='work<?= $i?>' name='works' type='radio' checked>
								<div class="relative">
									<label for='work<?= $i?>'>
										<span class='glyphicon glyphicon-calendar'></span> <?= $dp['created'] ?><br />
										<span class='medico'>Médico (a): <?= $dp['colaborador']['created'] ?></span>
									</label>
									<span class='circle'></span>
								</div>
								<div class='content'>
									<p>
										<i class="fa fa-stethoscope"></i>
										<span class='linha'></span>
										Frequência Cardiaca: <span><?= $dp['frequencia_cardiaca'] ?></span><br />
										Pressão Arterial: <span><?= $dp['pressao_arterial'] ?></span><br />
										Temperatura: <span><?= $dp['temperatura'] ?> ºC</span><br />
										<span class='linha'></span>
										Anamnese: <span><?= $dp['anamnese'] ?></span><br />
										Queixa: <span><?= $dp['queixa'] ?></span><br />
										<?php if( count($dp['atendimentos_doencas']) > 0 ) { ?>
											Diagnóstico: <span class='capitalize'><br />
											<?php
												foreach ($dp['atendimentos_doencas'] as $doenca):
													echo('- '.mb_strtolower($doenca['doenca']['nome']).'<br />');
												endforeach;
											?></span>
										<?php } ?>
										<?php if( count($dp['atendimentos_medicamentos']) > 0 ) { ?>
											Prescrição: <span class='capitalize'><br />
											<?php
												foreach ($dp['atendimentos_medicamentos'] as $med):
												
													if ( $med['uso'] == '1' ){
														$uso = 'Interno';
													} else {
														$uso = 'Externo';
													}
																				
													echo('- '.mb_strtolower($med['medicamento']['nome']).' - Uso '.$uso.' - '.$med['quantidade'].' - '.$med['intervalo'].' - '.$med['dias'].'<br />');
												endforeach;
											?></span>
										<?php } ?>
										<?php if( count($dp['atendimentos_exames']) > 0 ) { ?>
											Exames: <span class='capitalize'><br />
											<?php
												foreach ($dp['atendimentos_exames'] as $exame):
													echo('- '.mb_strtolower($exame['exame']['nome']).'<br />');
												endforeach;	
											?></span>
										<?php } ?>
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
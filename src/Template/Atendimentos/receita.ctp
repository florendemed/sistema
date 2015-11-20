<div class='receita'>
	<div id="row">
		<div class="col-md-12">
			<h4 class="text-center"><strong>Receituário</strong></h4>
		</div>
	</div>
	<div id="row">
		<div class="col-md-12">
			<p class='dados-paciente'>
				<?php 
					$nascimento = substr($dadosReceita['paciente']['data_nascimento'], 0, 10);	
					echo($dadosReceita['paciente']['nome'].'<br />Endereço: '.$dadosReceita['paciente']['endereco']['endereco'].', '.$dadosReceita['paciente']['endereco']['numero'].' - CEP: '.$dadosReceita['paciente']['endereco']['cep'].'<br /> Telefone: '.$dadosReceita['paciente']['telefone']['numero']);
				?>
			</p>
		</div>
	</div>
	<div id="row">
		<div class="col-md-12 dados-medicamentos">
			<?php 
			if( count($dadosReceita['atendimentos_medicamentos']) > 0 ) {
				foreach ($dadosReceita['atendimentos_medicamentos'] as $med): 
			?>
				<p class="capitalize">
					<?php
						if ( $med['uso'] == '1' ){
							$uso = 'Interno';
						} else {
							$uso = 'Externo';
						}
						if ( $med['quantidade'] != ''){ $quantidade = 'Tomar '.$med['quantidade'];}
						if ( $med['intervalo'] != ''){ $intervalo = ' de '.$med['intervalo']; }
						echo('<strong>'.mb_strtolower($med['medicamento']['nome']).'</strong> - Uso '.$uso.'<br />'.$quantidade.' '.$intervalo.'<br/>'.$med['dias']);
					?>
				</p>
				<?php 	endforeach; ?>
			<?php } else { ?>
				<p class="alert alert-warning">Nenhum resultado encontrado.</p>
			<?php }?>
		</div>
	</div>
	<div id="row">
		<div class="col-md-12">
			<p class='dados-data'>
				<?php 
					echo(date('l').', '.date('d').' de '.date('F').' de '.date('Y')); 
				?>
			</p>
		</div>
	</div>				
	<div id="row">
		<div class="col-md-12">
			<p class='dados-colaborador'>
				<?php 
					echo($dadosReceita['colaborador']['nome'].'<br />'.$dadosReceita['colaborador']['conselho_regional'].$dadosReceita['colaborador']['numero_conselho_regional']); 
				?>
			</p>
		</div>
	</div>		
</div>	
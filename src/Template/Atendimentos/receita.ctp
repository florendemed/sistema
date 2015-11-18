<div class='receita'>
	<div id="row">
		<div class="col-md-12">
			<h4 class="text-center"><strong>Receituário</strong></h4>
		</div>
	</div>
	<div id="row">
		<div class="col-md-12">
			<p class='dados-paciante'>
				<?php 
					echo($dadosConsulta['paciente']['nome'].'<br /> CPF: '.$dadosConsulta['paciente']['cpf'].'<br /> Nascimento: '.$dadosConsulta['paciente']['data_nascimento']); 
				?>
			</p>
		</div>
	</div>
	<div id="row">
		<div class="col-md-12">
			<?php 
			if( count($dadosReceita) > 0 ) {
				foreach ($dadosReceita as $dr): 
			?>
				<p class="capitalize dados-medicamentos">
					<?php
						if ( $dr->uso == '1' ){
							$uso = 'Interno';
						} else {
							$uso = 'Externo';
						}
						if ( $dr->quantidade != ''){ $quantidade = 'Tomar '.$dr->quantidade;}
						if ( $dr->intervalo != ''){ $intervalo = ' de '.$dr->intervalo; }
						echo(mb_strtolower($dr->medicamento->nome).' - Uso '.$uso.'<br />'.$quantidade.' '.$intervalo.'<br/>'.$dr->dias);
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
					echo(date('d/m/Y')); 
				?>
			</p>
		</div>
	</div>				
	<div id="row">
		<div class="col-md-12">
			<p class='dados-colaborador'>
				<?php 
					echo($dadosConsulta['colaborador']['nome'].'<br />'.$dadosConsulta['colaborador']['conselho_regional'].': '.$dadosConsulta['colaborador']['numero_conselho_regional']); 
				?>
			</p>
		</div>
	</div>		
</div>	
<?php
	if( $resultado->count() > 0 ) {

		$total_geral	= 0;
		$chart 			= null;
		foreach ($resultado as $qr): 
			$total_geral	= $total_geral + $qr->count;
			$chart = $chart."\n['".$combo_prioridades[$qr->prioridade]."',".$qr->count."],";	
		endforeach; 

		echo $this->Html->scriptBlock("
			google.load('visualization', '1', {packages:['corechart']});
			google.setOnLoadCallback(drawChart);
			function drawChart() {
				var data = google.visualization.arrayToDataTable([
					['Prioridade', 'Total'],
					".$chart."
				]);

				var options = {
					title: 'Prioridades de Atendimento',
					is3D: true,
				};

				var chart = new google.visualization.PieChart(document.getElementById('chart'));
				chart.draw(data, options);
			}
		");
	}
?>
<div class="row">
	<div class="col-md-12" id="mensagem_header_default">
		<ul class="breadcrumb">
			<li class="active">Dados / Relatórios / Prioridades de Atendimento</li>
		</ul>
		<div class="well filtros">
			<form action="/Relatorios/prioridades_atendimento" class="form-horizontal" method="get" accept-charset="utf-8">	
				<fieldset>
					<div class="row">
						<div class="col-md-2">
							<?php 
								echo $this->Form->text('dataInicio', ['class' => 'form-control date', 'placeholder' => 'Data Inicial', 'value' => @$this->request->query['dataInicio']]);
							?>
						</div>
						<div class="col-md-2">
							<?php 
								echo $this->Form->text('dataFim', ['class' => 'form-control date', 'placeholder' => 'Data Final', 'value' => @$this->request->query['dataFim']]);
							?>
						</div>
						<div class="col-md-2">
							<?php
								echo $this->Form->input('prioridade', array('label' => false, 'class' => 'form-control', 'options' => $combo_prioridades, 'empty' => 'Todos', 'value' => @$this->request->query['prioridade']));
							?>
						</div>
						<div class="col-md-1">
							<?php 
								echo $this->Form->submit('filtrar', ['class' => 'btn btn-primary btn', 'value' => 'filtrar']);
							?>
						</div>
					</div>
				</fieldset>
			</form>
		</div>
		<?php if( $resultado->count() > 0 ) { ?>
		<div class="table-responsive">
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>Prioridade Atendimento</th>
						<th>Total</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$total_geral	= 0;
					foreach ($resultado as $qr): 
						$total_geral	= $total_geral + $qr->count;
						?>
						<tr>
							<td><?= $combo_prioridades[$qr->prioridade]?></td>
							<td><?= $qr->count ?></td>
						</tr>
						<?php 
					endforeach; 
					?>
				</tbody>
				<tfoot>
					<tr>
						<td>Total: </td>
						<td><?= $total_geral; ?></td>
					</tr>
				</tfoot>
			</table>
		</div>
		<?php } else { ?>
			<p class="alert alert-warning">Nenhum resultado encontrado.</p>
		<?php }?>
		<div id="chart" style="width: 900px; height: 500px;"></div>
	</div>
</div>
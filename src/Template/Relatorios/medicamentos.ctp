<?php
	if( $resultado->count() > 0 ) {

		$total_geral	= 0;
		$chart 			= null;
		foreach ($resultado as $qr): 
			$total_geral		= $total_geral + $qr->count;
			$medicamentoNome	= mb_strtolower($qr->medicamento->nome);
			$chart = $chart."\n['".$medicamentoNome."',".$qr->count."],";	
		endforeach; 

		echo $this->Html->scriptBlock("
			google.load('visualization', '1', {packages:['corechart']});
			google.setOnLoadCallback(drawChart);
			function drawChart() {
				var data = google.visualization.arrayToDataTable([
					['Status', 'Total'],
					".$chart."
				]);

				var options = {
					title: 'Medicamentos',
					width: 500,
					height: 500,
					is3D: true,
					chartArea: {left:20,top:0,width:'100%',height:'60%'},
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
			<li class="active">Dados / Relatórios / Medicamentos</li>
		</ul>
		<div class="well filtros">
			<form action="/Relatorios/medicamentos" class="form-horizontal" method="get" accept-charset="utf-8">	
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
						<th>Medicamentos</th>
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
							<td class='capitalize'><?= mb_strtolower(substr($qr->medicamento->nome, 0, 40)) ?></td>
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
		<div id="chart" style="width: 1200px; height: 500px;"></div>
	</div>
</div>
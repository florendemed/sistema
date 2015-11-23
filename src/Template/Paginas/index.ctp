<h3>Atalhos Rápidos</h3>
<a class="btn btn-danger" href="/atendimentos/adicionar"><span class="fa fa-pencil-square-o"></span> Novo Atendimento</a>
<a class="btn btn-danger" href="/pacientes/"><span class="fa fa-book"></span> Prontuário</a>
<hr />
<h3>Relatórios</h3>
<div class='row'>
	<div class='col-md-4'>
		<h5><strong>Status de Atendimento</strong></h5>
		<?php
			if( $resultadoStatus->count() > 0 ) {

				$total_geral	= 0;
				$chart 			= null;
				foreach ($resultadoStatus as $qr): 
					$total_geral	= $total_geral + $qr->count;
					$chart = $chart."\n['".$qr->situacao->nome."',".$qr->count."],";	
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
							legend: 'none',
							title: '',
							width: 350,
							height: 260,
							is3D: true,
							legend: 'none',
							chartArea: {left:0,top:20,width:'90%',height:'90%'}
						};

						var chart = new google.visualization.PieChart(document.getElementById('chart'));
						chart.draw(data, options);
					}
				");
			}
		?>
		<div id="chart"></div>
	</div>
	<div class='col-md-4'>
		<h5><strong>Prioridades de Atendimento</strong></h5>
		<?php
			if( $resultadoPrioridade->count() > 0 ) {

				$total_geral	= 0;
				$chart 			= null;
				foreach ($resultadoPrioridade as $qr): 
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
							legend: 'none',
							title: '',
							width: 350,
							height: 260,
							is3D: true,
							legend: 'none',
							chartArea: {left:0,top:20,width:'90%',height:'90%'}
						};

						var chart = new google.visualization.PieChart(document.getElementById('chartPri'));
						chart.draw(data, options);
					}
				");
			}
		?>
		<div id="chartPri"></div>
	</div>
	<div class='col-md-4'>
		<h5><strong>Medicamentos</strong></h5>
		<?php
			if( $resultadoMedicamentos->count() > 0 ) {

				$total_geral	= 0;
				$chart 			= null;
				foreach ($resultadoMedicamentos as $qr): 
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
							legend: 'none',
							title: '',
							width: 350,
							height: 260,
							is3D: true,
							legend: 'none',
							chartArea: {left:0,top:20,width:'90%',height:'90%'},
						};

						var chart = new google.visualization.PieChart(document.getElementById('chartMed'));
						chart.draw(data, options);
					}
				");
			}
		?>
		<div id="chartMed"></div>
	</div>
</div>
<hr />
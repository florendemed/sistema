<?php
	echo $this->Html->scriptBlock("
		google.load('visualization', '1', {packages: ['corechart', 'bar']});
		google.setOnLoadCallback(drawTrendlines);

		function drawTrendlines() {
			var data = new google.visualization.DataTable();
			data.addColumn('timeofday', 'Time of Day');
			data.addColumn('number', 'Motivation Level');
			data.addColumn('number', 'Energy Level');

			data.addRows([
				[{v: [8, 0, 0], f: '8 am'}, 1, .25],
				[{v: [9, 0, 0], f: '9 am'}, 2, .5],
				[{v: [10, 0, 0], f:'10 am'}, 3, 1],
				[{v: [11, 0, 0], f: '11 am'}, 4, 2.25],
				[{v: [12, 0, 0], f: '12 pm'}, 5, 2.25],
				[{v: [13, 0, 0], f: '1 pm'}, 6, 3],
				[{v: [14, 0, 0], f: '2 pm'}, 7, 4],
				[{v: [15, 0, 0], f: '3 pm'}, 8, 5.25],
				[{v: [16, 0, 0], f: '4 pm'}, 9, 7.5],
				[{v: [17, 0, 0], f: '5 pm'}, 10, 10],
			]);

			var options = {
				title: 'Motivation and Energy Level Throughout the Day',
				trendlines: {
					0: {type: 'linear', lineWidth: 5, opacity: .3},
					1: {type: 'exponential', lineWidth: 10, opacity: .3}
				},
				hAxis: {
					title: 'Time of Day',
					format: 'h:mm a',
					viewWindow: {
						min: [7, 30, 0],
						max: [17, 30, 0]
					}
				},
				vAxis: {
					title: 'Rating (scale of 1-10)'
				}
			};

			var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
			chart.draw(data, options);
		}
	");
?>
<div class="row">
	<div class="col-md-12" id="mensagem_header_default">
		<ul class="breadcrumb">
			<li class="active">Dados / Relatórios</li>
		</ul>
		<div class="well filtros">
			<form action="/colaboradores/index" class="form-horizontal" id="colaboradorIndexForm" method="get" accept-charset="utf-8">	
				<fieldset>
					<div class="row">
						<div class="col-md-3">
							<?php 
								echo $this->Form->text('nome', ['class' => 'form-control', 'id' => 'colaboradorNome', 'placeholder' => 'Nome']);
							?>
						</div>
						<div class="col-md-2">
							<?php 
								echo $this->Form->text('cpf', ['class' => 'form-control', 'id' => 'colaboradorCpf', 'placeholder' => 'CPF']);
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
		<div id="chart_div"></div>
	</div>
</div>
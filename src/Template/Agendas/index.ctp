<?php
echo $this->Html->scriptBlock("
	$(document).ready(function() {
		$('#calendar').fullCalendar({
			header: {
			  left: 'prev,next today',
			  right:'',
			  center:''
			},
			allDaySlot: false,
			defaultDate: new Date(),
			defaultView: 'agendaWeek',
			minTime: '06:00:00',
			maxTime: '21:00:00',
			slotDuration: '00:15:00',
			columnFormat: {
				month: 'MMMM yyyy',
				week: 'ddd DD/MM/YYYY'
			},
			editable: false,
			eventLimit: false,
			timeFormat: 'HH:mm',
			dayClick: function(date, jsEvent, view) {
				var dataHora = date.format('DD-MM-YYYY HH:mm');
				window.location.href='/agendas/adicionar/'+dataHora+'/'+$('#profissional').val();
			},
			eventClick: function(calEvent, jsEvent, view) {
				alert('Event: ' + calEvent.title);
				alert('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY);
				alert('View: ' + view.name);
				// change the border color just for fun
				$(this).css('border-color', 'red');
			}
		});
	});
");
?>
<div class="row">
	<div class="col-md-12" id="mensagem_header_default">
		<ul class="breadcrumb">
			<li class="active">Agenda</li>
		</ul>
		<p class="alert alert-info">Selecione o <strong>profissional</strong> para carregar a agenda.</p>
		<div class="well">
			<div class="row">
				<div class="col-md-6">
					<form action="/colaboradores/index" class="form-horizontal" id="colaboradorIndexForm" method="get" accept-charset="utf-8">	
						<fieldset>
							<div class="form-group required">
								<?php echo $this->Form->label('profissionais', 'Profissionais', ['class' => 'col-md-3 control-label']); ?>
								<div class="col-md-5">
									<?php
										$options = ['' => '', '1' => 'Profissional 1', '2' => 'Profissional 2', '3' => 'Profissional 3', '4' => 'Profissional 4'];
										echo $this->Form->select('profissionais', $options,[ 'class' => 'form-control', 'id' => 'profissional']);		
									?>
								</div>
							</div>	
						</fieldset>
					</form>
				</div>
			</div>
		</div>
		<div id='calendar'></div>
	</div>
</div>
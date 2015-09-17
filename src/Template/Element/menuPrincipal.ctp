<nav class="navbar navbar-default">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<?php 
						echo $this->Html->link(
							$this->Html->image('logo.png'),
							'/index',
							['class' => 'navbar-brand',
							'escape' => false]
						);
					?>
					<!--a class="navbar-brand" href="index.php"><img src="img/logo.png" /></a-->
				</div>
				<div class="collapse navbar-collapse">
					<ul class="nav navbar-nav navbar-right">
						<li><a href="/colaboradores/editar/<?= h($logado[0]->id); ?>" title="Colaborador - Alterar Dados"><?= $logado[0]->nome; ?> <span class="glyphicon glyphicon-user"></span></a></li>
						<!--li><a href="" title="Configurações"><span class="glyphicon glyphicon-cog"></span></a></li-->
						<li><a href="/sair"><button type="button" class="btn btn-default btn-sm btn-danger">Sair</button></a></li>
					</ul>
					<ul class="nav navbar-nav">
						<li><a href="/atendimentos">Atendimentos</a></li>
						<li><a href="/prontuarios">Prontuário</a></li>
						<li class="dropdown"><a href="" class="dropdown-toggle" data-toggle="dropdown">Dados<b class="caret"></b></a>
							<ul class="dropdown-menu" role="menu">
								<li class=""><a href="/colaboradores/index">Colaboradores</a></li>
								<li class=""><a href="/pacientes/index">Pacientes</a></li>
								<li class=""><a href="/doencas/index">Doenças</a></li>
								<li class=""><a href="/exames/index">Exames</a></li>
								<li class=""><a href="/medicamentos/index">Medicamentos</a></li>
							</ul>
						</li>
						<li class="dropdown"><a href="" class="dropdown-toggle" data-toggle="dropdown">Acessos<b class="caret"></b></a>
							<ul class="dropdown-menu" role="menu">
								<li class=""><a href="/permissoes/index">Permissões</a></li>
								<li class=""><a href="/grupos/index">Grupos</a></li>
							</ul>
						</li>
						<li><a href="/relatorios/index">Relatorios</a></li>
					</ul>
				</div>
			</div>
		</div>	
	</div>
</nav>
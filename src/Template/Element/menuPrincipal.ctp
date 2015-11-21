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
						<li><a href="/sair"><button type="button" class="btn btn-default btn-sm btn-danger">Sair</button></a></li>
					</ul>
					<ul class="nav navbar-nav">
						<?php
						foreach ( $menus as $m ) {
							if ( count($m['filhos']) == 0 ) {
								//sem submenu
								$url	= ucfirst($m['controlador']) . '/' . strtolower($m['acao']);
								echo '<li><a href="/' . $url . '">' . $m['nome'] . '</a></li>';
							} else {
								//com submenu
								echo '<li class="dropdown"><a href="/' . @$url . '" class="dropdown-toggle" data-toggle="dropdown">' . $m['nome'] . '<b class="caret"></b></a>';
									echo '<ul class="dropdown-menu" role="menu">';
									foreach ( $m['filhos'] as $f ) {
										$url	= ucfirst($f['controlador']) . '/' . strtolower($f['acao']);
										echo '<li class=""><a href="/' . $url . '">' . $f['nome'] . '</a></li>';
									}	
								echo '</ul>
								</li>';
							}
							//$m['filhos']
						}
						?>
					</ul>
				</div>
				
				<!--
				<div class="collapse navbar-collapse">
					<ul class="nav navbar-nav navbar-right">
						<li><a href="/colaboradores/editar/<?= h($logado[0]->id); ?>" title="Colaborador - Alterar Dados"><?= $logado[0]->nome; ?> <span class="glyphicon glyphicon-user"></span></a></li>
						<li><a href="/sair"><button type="button" class="btn btn-default btn-sm btn-danger">Sair</button></a></li>
					</ul>
					<ul class="nav navbar-nav">
						<li><a href="/atendimentos">Atendimentos</a></li>
						<li><a href="/pacientes/index">Pacientes</a></li>
						<li class="dropdown"><a href="" class="dropdown-toggle" data-toggle="dropdown">Dados<b class="caret"></b></a>
							<ul class="dropdown-menu" role="menu">
								<li class=""><a href="/colaboradores/index">Colaboradores</a></li>
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
						<li class="dropdown"><a href="" class="dropdown-toggle" data-toggle="dropdown">Relatórios<b class="caret"></b></a>
							<ul class="dropdown-menu" role="menu">
								<li class=""><a href="/relatorios/prioridades_atendimento">Prioridades de Atendimento</a></li>
								<li class=""><a href="/relatorios/status_atendimento">Status de Atendimento</a></li>
								<li class=""><a href="/relatorios/medicamentos">Medicamentos</a></li>
								<li class=""><a href="/relatorios/exames">Exames</a></li>
								<li class=""><a href="/relatorios/doencas">Doenças</a></li>
							</ul>
						</li>
					</ul>
				</div>
				-->
			</div>
		</div>	
	</div>
</nav>
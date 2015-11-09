<?php
if ( $medicamentos->count() == 0 ) {
	?>
	<p class="alert alert-info">Nenhum medicamento inserido</p>
	<?php
} else {
	pr($medicamentos->toArray());
}
<div>
	<?php if(isset($_SESSION['is_logged_in'])) : ?>
	<a class="btn btn-success btn-share" href="<?php echo ROOT_PATH; ?>animals/add">Share Something</a>
	<?php endif; ?>

<!-- Bucle para recorer los animales y dentro de el los comentarios -->

	<?php foreach($viewmodel as $item) : ?>
		<div class="well">
			<h3><?php echo $item['titulo']; ?></h3>
			<small><?php echo $item['fechaComentario']; ?></small>
			<hr />
			<p><?php echo $item['texto']; ?></p>
			<br>
			<a class="btn btn-danger"href="animals/delete/<?php echo $item['idComentario']?>">Delete</a>
		</div>
	<?php endforeach; ?>

<!-- Fin del bucle de los animales -->
</div>
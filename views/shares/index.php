<div>
	<?php if(isset($_SESSION['is_logged_in'])) : ?>
	<a class="btn btn-success btn-share" href="<?php echo ROOT_PATH; ?>shares/add">Share Something</a>
	<?php endif; ?>
	<?php foreach($viewmodel as $item) : ?>
		<div class="well">
			<h3><?php echo $item['titulo']; ?></h3>
			<small><?php echo $item['fechaComentario']; ?></small>
			<hr />
			<p><?php echo $item['texto']; ?></p>
		</div>
	<?php endforeach; ?>
</div>
<div>

<?php foreach ($viewmodel[0] as $item0) :?><!-- Bucle para recorer los animales y dentro de el los comentarios -->
	<div class="well">
			<h3><?php echo $item0['nombreAnimal']; ?></h3>

			<?php if(isset($_SESSION['is_logged_in'])) : ?>
			<a class="btn btn-success btn-share" href="<?php echo ROOT_PATH; ?>animals/add/<?php echo $item0['idAnimal']?>">Comment</a>
			<?php endif; ?>
		<?php foreach($viewmodel[1] as $item1) : ?>
			<?php if($item0['idAnimal'] == $item1['idAnimal']) : ?>
			<div class="well">
				<h3><?php echo $item1['titulo']; ?></h3>
				<small><?php echo $item1['fechaComentario']; ?></small>
				<hr />
				<p><?php echo $item1['texto']; ?></p>
				<br>
				<a class="btn btn-danger"href="animals/delete/<?php echo $item1['idComentario']?>">Delete Comment</a>
			</div>
			<?php endif; ?>

		<?php endforeach; ?>
	</div>
<?php endforeach; ?><!-- Fin del bucle de los animales -->

</div>
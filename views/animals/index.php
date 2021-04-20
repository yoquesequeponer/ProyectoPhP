<div>
<?php if(isset($_SESSION['is_logged_in'])&&$_SESSION['user_data']['rol']==1) : ?>
<a class="btn btn-success btn-share" href="<?php echo ROOT_PATH; ?>animals/addAnimal">Add Animal</a>
<?php endif; ?>

<?php foreach ($viewmodel[0] as $item0) :?><!-- Bucle para recorer los animales y dentro de el los comentarios -->
	<div class="well">
			<h3><?php echo $item0['nombreAnimal']; ?></h3>

			<?php if(isset($_SESSION['is_logged_in'])) : ?>
			<a class="btn btn-success btn-share" href="<?php echo ROOT_PATH; ?>animals/add/<?php echo $item0['idAnimal']?>">Comment</a>
			
			
			<!-- <a class="btn btn-success btn-share" href="<?php echo ROOT_PATH; ?>animals/acoger/<?php echo $item0['idAnimal']?>">Acoger</a> -->
			
			
			<a class="btn btn-success btn-share" href="<?php echo ROOT_PATH; ?>animals/adoptar/<?php echo $item0['idAnimal']?>">Adoptar</a>
			<?php endif; ?>

		<?php foreach($viewmodel[1] as $item1) : ?><!-- Bucle de los comentarios -->
			<?php if($item0['idAnimal'] == $item1['idAnimal']) : ?>
			<div class="well">
				<h3><?php echo $item1['titulo']; ?></h3>
				<small><?php echo $item1['fechaComentario']; ?></small>
				<hr />
				<p><?php echo $item1['texto']; ?></p>
				<br>
				<?php if(isset($_SESSION['is_logged_in'] ) ) : ?>
					<?php if($item1['idUsuario'] == $_SESSION['user_data']['idUsuario'] || $_SESSION['user_data']['rol']==1) : ?>
						<a class="btn btn-danger"href="animals/delete/<?php echo $item1['idComentario']?>">Delete Comment</a>
					<?php endif; ?>
				<?php endif; ?>
			</div>
			<?php endif; ?>

		<?php endforeach; ?><!-- Fin bucle de los comentarios -->
		<br>
		<?php if(isset($_SESSION['is_logged_in'])&&$_SESSION['user_data']['rol']==1) : ?>
		<a class="btn btn-danger"href="animals/deleteAnimal/<?php echo $item0['idAnimal']?>">Delete Animal</a>
		<?php endif; ?>
	</div>
<?php endforeach; ?><!-- Fin del bucle de los animales -->

</div>
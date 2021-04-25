<div>
<?php if(isset($_SESSION['is_logged_in'])&&$_SESSION['user_data']['rol']==1) : ?>
<a class="btn btn-success btn-share" href="<?php echo ROOT_PATH; ?>animals/addAnimal">Add Animal</a>
<?php endif; ?>

<br />
<?php 
// Páginas
$resto = floor($_SESSION['num_animals'] % ITEMSPAG);
$total_paginas = floor($_SESSION['num_animals'] / ITEMSPAG);
if ($resto > 0) $total_paginas = $total_paginas + 1;
//echo "total_paginas=".$total_paginas;
//echo "resto = ".$resto;
?>
<?php if ($_SESSION['pag'] > 1) {?><a  class="btn btn-success btn-share"href="<?php echo ($_SESSION['pag']-1)?>"><<  </a><?php } ?>
<?php if ($_SESSION['pag'] < $total_paginas) {?><a class="btn btn-success btn-share" href="<?php echo ($_SESSION['pag']+1)?>">   >></a><?php } ?>

<?php foreach ($viewmodel[0] as $item0) :?><!-- Bucle para recorer los animales y dentro de el los comentarios -->
	 <?php //if(empty($item0['fechaAdopcion'])  ) : ?> <!--&& $item0['fechaFin']<=date('Y-m-d')-->
	<div class="well">
	
			<h3><?php echo $item0['nombreAnimal']; ?></h3>

			<img src="<?php echo $item0['imagenAnimal']; ?>">

			<?php if(isset($_SESSION['is_logged_in'])) : ?>
			<a class="btn btn-success btn-share" href="<?php echo ROOT_PATH; ?>comentarios/add/<?php echo $item0['idAnimal']?>">Comment</a>
			
			
			<a class="btn btn-success btn-share" href="<?php echo ROOT_PATH; ?>acoger/acoger/<?php echo $item0['idAnimal']?>">Acoger</a> 
			
			
			<a class="btn btn-success btn-share" href="<?php echo ROOT_PATH; ?>adoptar/adoptar/<?php echo $item0['idAnimal']?>">Adoptar</a>
			<?php endif; ?>

		<?php foreach($viewmodel[1] as $item1) : ?><!-- Bucle de los comentarios -->
			<?php if($item0['idAnimal'] == $item1['idAnimal']) : ?>
			<div class="well">
				<h3><?php echo $item1['titulo']; ?></h3>
				<small><?php echo $item1['fechaComentario'];?></small>
				<hr/>
				<p><?php echo $item1['texto']; ?></p>
				<br>
				<?php if(isset($_SESSION['is_logged_in'] ) ) : ?>
					<?php if($item1['idUsuario'] == $_SESSION['user_data']['idUsuario'] || $_SESSION['user_data']['rol']==1) : ?>
						<a class="btn btn-danger" href="comentarios/delete/<?php echo $item1['idComentario']?>">Delete Comment</a>
					<?php endif; ?>
				<?php endif; ?>
			</div>
			<?php endif; ?>

		<?php endforeach; ?><!-- Fin bucle de los comentarios -->
		<br>
		<?php if(isset($_SESSION['is_logged_in'])&&$_SESSION['user_data']['rol']==1) : ?>
		<a class="btn btn-danger" href="animals/deleteAnimal/<?php echo $item0['idAnimal']?>">Delete Animal</a>
		<?php endif; ?>
	</div>
	 <?php //endif; ?> 
	
<?php endforeach; ?><!-- Fin del bucle de los animales -->


<?php if ($_SESSION['pag'] > 1) {?><a  class="btn btn-success btn-share"href="<?php echo ($_SESSION['pag']-1)?>"><<  </a><?php } ?>
<?php if ($_SESSION['pag'] < $total_paginas) {?><a class="btn btn-success btn-share" href="<?php echo ($_SESSION['pag']+1)?>">   >></a><?php } ?>



</div>
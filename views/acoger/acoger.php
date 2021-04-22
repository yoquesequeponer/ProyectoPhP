<div class="panel panel-default">
  <div class="panel-body">
    <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
    	<div class="form-group">
    		<label>dia de inicio</label>
    		<input type="date" name="diaInicio" class="form-control" />

            <label>dia de fin</label>
    		<input type="date" name="diaFin" class="form-control" />
    	</div>
    	<input class="btn btn-primary" name="submit" type="submit" value="Submit" />
        <a class="btn btn-danger" href="<?php echo ROOT_PATH; ?>animal">Cancel</a>
    </form>
  </div>
</div>
<?php
class animalModel extends Model{

	public function Index(){
		//echo "XXX".$_SESSION['pag']."XXX";
		//echo "YY".ITEMSPAG."YY";

		// items pagina
		$this->query('SELECT count(*) as contador FROM animal');
		$_SESSION['num_animals'] = ($this->resultSet())[0]['contador'];
		//echo $_SESSION['num_animals'];
		//echo "XXX".print_r($_SESSION['num_animals'])."XXX";
		$limit_a = ($_SESSION['pag']-1) * ITEMSPAG;
		//echo 'SELECT * FROM animal ORDER by idAnimal ASC LIMIT '.$limit_a.','.ITEMSPAG;
		$this->query('SELECT * FROM animal ORDER by idAnimal ASC LIMIT '.$limit_a.','.ITEMSPAG);/*left join acoge on animal.idAnimal=acoge.idAnimal*/
		$rows[0] = $this->resultSet();
		//echo "<pre>";print_r($rows[0]);echo "</pre>";
		$this->query('SELECT * FROM comentario');
		$rows[1] = $this->resultSet();
		
		
		return $rows;
	}

	public function addAnimal(){
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
		
		$img=base64_encode(file_get_contents($_FILES['imagen']['tmp_name']));
		if(isset($post['submit'])){
			if($post['nombreAnimal'] == ''){
				Messages::setMsg('Please Fill In All Fields', 'error');
				return;
			}
			// Insert into MySQL
			$this->query('INSERT INTO animal (nombreAnimal,imagenAnimal) VALUES(:nombreAnimal,:imagenAnimal)');
			$this->bind(':nombreAnimal', $post['nombreAnimal']);
			$this->bind(':imagenAnimal', $post['imagenAnimal']);
			$this->execute();
			// Verify
			if($this->lastInsertId()){
				// Redirect
				header('Location: '.ROOT_URL.'animals');
			}
		}
		return;

	}
	public function deleteAnimal(){
		$id = $_GET['id'];
		
		$this->query('DELETE FROM animal WHERE idAnimal=:id');
		$this->bind(':id',$id);
		$this->execute();
		
		if($this->lastInsertId()){
			// Redirect
			header('Location: '.ROOT_URL.'animals');
		}
	}

}
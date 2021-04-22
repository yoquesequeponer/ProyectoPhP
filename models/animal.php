<?php
class animalModel extends Model{

	public function Index(){
		$this->query('SELECT * FROM animal');
		$rows[0] = $this->resultSet();
		$this->query('SELECT * FROM comentario');
		$rows[1] = $this->resultSet();
		return $rows;
	}

	public function addAnimal(){
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

		if(isset($post['submit'])){
			if($post['nombreAnimal'] == ''){
				Messages::setMsg('Please Fill In All Fields', 'error');
				return;
			}
			// Insert into MySQL
			$this->query('INSERT INTO animal (nombreAnimal) VALUES(:nombreAnimal)');
			$this->bind(':nombreAnimal', $post['nombreAnimal']);
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
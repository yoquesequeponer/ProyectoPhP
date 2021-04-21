<?php
class animalModel extends Model{

	public function Index(){
		$this->query('SELECT * FROM animal');
		$rows[0] = $this->resultSet();
		$this->query('SELECT * FROM comentario');
		$rows[1] = $this->resultSet();
		return $rows;
	}


	public function add(){
		$id = $_GET['id'];
		// Sanitize POST
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

		if(isset($post['submit'])){
			if($post['title'] == '' || $post['body'] == ''){
				Messages::setMsg('Please Fill In All Fields', 'error');
				return;
			}
			// Insert into MySQL
			$this->query('INSERT INTO comentario (titulo, texto, idUsuario, idAnimal) VALUES(:title, :body, :user_id, :idAnimal)');
			$this->bind(':title', $post['title']);
			$this->bind(':body', $post['body']);
			$this->bind(':user_id', $_SESSION['user_data']['idUsuario']);
			$this->bind(':idAnimal', $id);
			$this->execute();
			// Verify
			if($this->lastInsertId()){
				// Redirect
				header('Location: '.ROOT_URL.'animals');
			}
		}
		return;
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

	public function delete(){
		$id = $_GET['id'];
		
		$this->query('DELETE FROM comentario WHERE idComentario=:id');
		$this->bind(':id',$id);
		$this->execute();
		
		if($this->lastInsertId()){
			// Redirect
			header('Location: '.ROOT_URL.'animals');
		}
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

	public function adoptar(){
        $id = $_GET['id'];
        $today = date('Y-m-d');
		$idUser=$_SESSION['user_data']['idUsuario'];
		
			// Insert into MySQL
			$this->query('UPDATE animal set fechaAdopcion=:fechaAdopcion, idUsuarioAdop=:idUsuarioAdop where idAnimal=:id');
			$this->bind(':fechaAdopcion', $today);
			$this->bind(':id',$id);
			$this->bind(':idUsuarioAdop', $idUser);
			$this->execute();
			//echo $today;
			//die;
			// Verify
			if($this->lastInsertId()){
				// Redirect
				header('Location: '.ROOT_URL.'animals');
			}
		
    }
}
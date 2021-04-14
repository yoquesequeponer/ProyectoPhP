<?php
class animalModel extends Model{
	public function Index(){
		$this->query('SELECT * FROM comentario ORDER BY fechaComentario DESC');
		$rows = $this->resultSet();
		return $rows;
	}

	public function add(){
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
			$this->bind(':idAnimal', 1);
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
}
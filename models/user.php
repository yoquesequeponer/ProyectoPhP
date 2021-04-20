<?php
class UserModel extends Model{
	public function register(){
		// Sanitize POST
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

		

		if(isset($post['submit'])){
			if($post['name'] == '' || $post['email'] == '' || $post['password'] == ''){
				Messages::setMsg('Please Fill In All Fields', 'error');
				return;
			}
			$password = md5($post['password']);
			// Insert into MySQL
			$this->query('INSERT INTO usuario (username, email, password) VALUES(:name, :email, :password)');
			$this->bind(':name', $post['name']);
			$this->bind(':email', $post['email']);
			$this->bind(':password', $password);
			$this->execute();
			// Verify
			if($this->lastInsertId()){
				// Redirect
				header('Location: '.ROOT_URL.'users/login');
			}
		}
		return;
	}

	public function login(){
		// Sanitize POST
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

		

		if(isset($post['submit'])){
			// Compare Login
			$password = md5($post['password']);
			$this->query('SELECT * FROM usuario WHERE email = :email AND password = :password');
			$this->bind(':email', $post['email']);
			$this->bind(':password', $password);
			
			$row = $this->single();

			if($row){
				$_SESSION['is_logged_in'] = true;
				$_SESSION['user_data'] = array(
					"idUsuario"	=> $row['idUsuario'],
					"UserName"	=> $row['UserName'],
					"email"	=> $row['email'],
					"rol" => $row['rol']
				);
				header('Location: '.ROOT_URL);
			} else {
				Messages::setMsg('Incorrect Login', 'error');
			}
		}
		return;
	}
}
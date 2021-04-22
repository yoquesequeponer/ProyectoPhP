<?php
class acogerModel extends Model{

	public function acoger(){
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
		$id = $_GET['id'];//idAnimal
        $idUser=$_SESSION['user_data']['idUsuario'];
		//print_r($post['diaFin']); die;
        if(isset($post['submit'])){
			if($post['diaInicio'] == ''||$post['diaFin']=''){
				Messages::setMsg('Please Fill In All Fields', 'error');
				return;
			}
		// Insert into MySQL
		
        $this->query('INSERT INTO acoge (idUsuario, idAnimal, fechaAcogida, fechaFin) VALUES(:idUsuarioAdop, :id, :diaInicio, :diaFin)');
        $this->bind(':idUsuarioAdop', $idUser);
        $this->bind(':id',$id);
        $this->bind(':diaInicio', $post['diaInicio']);
        $this->bind(':diaFin', $post['diaFin']);
        $this->execute();

        // Verify
			if($this->lastInsertId()){
				// Redirect
				header('Location: '.ROOT_URL.'animals');
			}
		}
		return;
    }
}
<?php
class adoptarModel extends Model{

	public function acoger(){
        $id = $_GET['id'];//idAnimal
        $idUser=$_SESSION['user_data']['idUsuario'];
        if(isset($post['submit'])){
			if($post['diaInicio'] == ''||$post['diaFin']=''){
				Messages::setMsg('Please Fill In All Fields', 'error');
				return;
			}
		// Insert into MySQL
        $this->query('UPDATE acoge set idUsuario=:idUser, idAnimal=:id, fechaAcogida=:fechaInicio, fechaFin=:fechaFin where idAnimal=:id');
        $this->bind(':idUsuarioAdop', $idUser);
        $this->bind(':id',$id);
        $this->bind(':fechaInicio', $post['diaInicio]');
        $this->bind(':fechaFin', $post['diaFin]');
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
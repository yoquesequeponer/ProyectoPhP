<?php
class adoptarModel extends Model{

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
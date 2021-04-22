<?php 
class comentarios extends Controller{
    protected function add(){
		if(!isset($_SESSION['is_logged_in'])){
			header('Location: '.ROOT_URL.'animal');
		}
		$viewmodel = new comentarioModel();
		$this->returnView($viewmodel->add(), true);
	}
    protected function delete(){
		if(!isset($_SESSION['is_logged_in']) ){
			header('Location: '.ROOT_URL.'animal');
		}
		$viewmodel = new comentarioModel();
		$this->returnView($viewmodel->delete(), true);
	}
}
<?php
class adoptar extends Controller{
	protected function adoptar(){
		if(!isset($_SESSION['is_logged_in']) ){
			header('Location: '.ROOT_URL.'animal');
		}
		$viewmodel = new adoptarModel();
		$this->returnView($viewmodel->adoptar(), true);
	}
	
}
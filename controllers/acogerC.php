<?php
class acoger extends Controller{
	protected function acoger(){
		if(!isset($_SESSION['is_logged_in']) ){
			header('Location: '.ROOT_URL.'animal');
		}
		$viewmodel = new acogerModel();
		$this->returnView($viewmodel->acoger(), true);
	}
}
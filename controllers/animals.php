<?php
class animals extends Controller{
	protected function Index(){
		$viewmodel = new animalModel();
		$this->returnView($viewmodel->Index(), true);
	}

	protected function add(){
		if(!isset($_SESSION['is_logged_in'])){
			header('Location: '.ROOT_URL.'animal');
		}
		$viewmodel = new animalModel();
		$this->returnView($viewmodel->add(), true);
	}

	protected function addAnimal(){
		if(!isset($_SESSION['is_logged_in'])){
			header('Location: '.ROOT_URL.'animal');
		}
		$viewmodel = new animalModel();
		$this->returnView($viewmodel->addAnimal(), true);
	}

	protected function delete(){
		if(!isset($_SESSION['is_logged_in']) ){
			header('Location: '.ROOT_URL.'animal');
		}
		$viewmodel = new animalModel();
		$this->returnView($viewmodel->delete(), true);
	}

	protected function deleteAnimal(){
		if(!isset($_SESSION['is_logged_in']) ){
			header('Location: '.ROOT_URL.'animal');
		}
		$viewmodel = new animalModel();
		$this->returnView($viewmodel->deleteAnimal(), true);
	}
}
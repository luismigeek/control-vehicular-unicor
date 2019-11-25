<?php

class administrativos extends Controller{
	
	function __construct() {
		parent::__construct();

		$this->view->usuario = '';
		$this->view->msg = '';
	}

	function render() {
		
		session_start();
		if (isset($_SESSION['ROL'])) {
			if ($_SESSION['ROL'] != 'administrativo') {
				$this->view->usuario = '<script> window.location="' . $_SESSION['url'] . '"</script>';
			} else {
				$this->view->usuario = '[Administrativo] ' . $_SESSION['USUARIO'];
			}
		} else {
			$this->view->usuario = '<script> window.location="' . URL . "home/login" . '"</script>';
		}
		$this->view->render('administrativos/index');
	}

	#------------------- REPORTES -------------------#

	public function users(){
		
		session_start();
		if (isset($_SESSION['ROL'])) {
			if ($_SESSION['ROL'] != 'administrativo') {
				$this->view->usuario = '<script> window.location="' . $_SESSION['url'] . '"</script>';
			} else {
				$this->view->usuario = '[Administrativo] ' . $_SESSION['USUARIO'];
				$this->view->personas = is_array($this->model->get_personas()) ? $this->model->get_personas() : [];
			}
		} else {
			$this->view->usuario = '<script> window.location="' . URL . "home/login" . '"</script>';
		}

		$this->view->render('administrativos/users');
	}

	public function vehicles(){
	
		session_start();
		if (isset($_SESSION['ROL'])) {
			if ($_SESSION['ROL'] != 'administrativo') {
				$this->view->usuario = '<script> window.location="' . $_SESSION['url'] . '"</script>';
			} else {
				$this->view->usuario = '[Administrativo] ' . $_SESSION['USUARIO'];
				$this->view->vehiculos = is_array($this->model->get_vehiculos()) ? $this->model->get_vehiculos() : [];
			}
		} else {
			$this->view->usuario = '<script> window.location="' . URL . "home/login" . '"</script>';
		}

		$this->view->render('administrativos/vehicles');
	}

	public function vehiclesincampus(){

		session_start();
		if (isset($_SESSION['ROL'])) {
			if ($_SESSION['ROL'] != 'administrativo') {
				$this->view->usuario = '<script> window.location="' . $_SESSION['url'] . '"</script>';
			} else {
				$this->view->usuario = '[Administrativo] ' . $_SESSION['USUARIO'];
				$this->view->list_vehicles = is_array($this->model->get_vehiculos_in_campus()) ? $this->model->get_vehiculos_in_campus() : [];
			}
		} else {
			$this->view->usuario = '<script> window.location="' . URL . "home/login" . '"</script>';
		}

		$this->view->render('administrativos/vehiclesincampus');

	}

	public function entrytoday(){

		session_start();
		if (isset($_SESSION['ROL'])) {
			if ($_SESSION['ROL'] != 'administrativo') {
				$this->view->usuario = '<script> window.location="' . $_SESSION['url'] . '"</script>';
			} else {
				$this->view->usuario = '[Administrativo] ' . $_SESSION['USUARIO'];
				$this->view->list_vehicles = is_array($this->model->get_entraronhoy()) ? $this->model->get_entraronhoy() : [];
			}
		} else {
			$this->view->usuario = '<script> window.location="' . URL . "home/login" . '"</script>';
		}

		$this->view->render('administrativos/entrytoday');
		
	}

	public function entrymonth(){
		session_start();
		if (isset($_SESSION['ROL'])) {
			if ($_SESSION['ROL'] != 'administrativo') {
				$this->view->usuario = '<script> window.location="' . $_SESSION['url'] . '"</script>';
			} else {
				$this->view->usuario = '[Administrativo] ' . $_SESSION['USUARIO'];
				$this->view->list_vehicles = is_array($this->model->get_entraronmes()) ? $this->model->get_entraronmes() : [];
			}
		} else {
			$this->view->usuario = '<script> window.location="' . URL . "home/login" . '"</script>';
		}

		$this->view->render('administrativos/entrymonth');		
	}
	
	public function entryhour(){
		session_start();
		if (isset($_SESSION['ROL'])) {
			if ($_SESSION['ROL'] != 'administrativo') {
				$this->view->usuario = '<script> window.location="' . $_SESSION['url'] . '"</script>';
			} else {
				$this->view->usuario = '[Administrativo] ' . $_SESSION['USUARIO'];
				$this->view->list_vehicles = is_array($this->model->get_entraronhour()) ? $this->model->get_entraronhour() : [];
			}
		} else {
			$this->view->usuario = '<script> window.location="' . URL . "home/login" . '"</script>';
		}

		$this->view->render('administrativos/entryhour');		
	}

	public function entryfiltro(){
		session_start();
		if (isset($_SESSION['ROL'])) {
			if ($_SESSION['ROL'] != 'administrativo') {
				$this->view->usuario = '<script> window.location="' . $_SESSION['url'] . '"</script>';
			} else {
				$this->view->usuario = '[Administrativo] ' . $_SESSION['USUARIO'];
				$this->view->historial = is_array($this->model->get_historial()) ? $this->model->get_historial() : [];
			}
		} else {
			$this->view->usuario = '<script> window.location="' . URL . "home/login" . '"</script>';
		}

		$this->view->render('administrativos/entryfiltro');		
	}

	public function historial(){
		session_start();
		if (isset($_SESSION['ROL'])) {
			if ($_SESSION['ROL'] != 'administrativo') {
				$this->view->usuario = '<script> window.location="' . $_SESSION['url'] . '"</script>';
			} else {
				$this->view->usuario = '[Administrativo] ' . $_SESSION['USUARIO'];
				$historial = $this->model->get_historial(
					[
						'inicio'=>$_POST['inicio'],
						'final'=>$_POST['final']
					]
				);

				$this->view->historial = is_array($historial) ? $historial : [];
			}
		} else {
			$this->view->usuario = '<script> window.location="' . URL . "home/login" . '"</script>';
		}

		$this->view->render('administrativos/historial');
	}

}

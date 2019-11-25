<?php

include_once 'models/class/validaciones.php';
include_once 'models/class/operaciones.php';


class visitantes extends Controller
{

	function __construct()
	{

		parent::__construct();

		$this->view->usuario = '';
		$this->view->msg = '';
	}

	function render(){

		session_start();
		if (isset($_SESSION['ROL'])) {

			if ($_SESSION['ROL'] != 'visitante') {
				$this->view->usuario = '<script> window.location="' . $_SESSION['url'] . '"</script>';
			} else {
				$this->view->usuario = '[Visitante] ' . $_SESSION['USUARIO'];
			}
		} else {
			$this->view->usuario = '<script> window.location="' . URL . "home/login" . '"</script>';
		}

		$this->view->render('visitantes/index');
	}

	public function register(){

		session_start();
		if (isset($_SESSION['ROL'])) {
			if ($_SESSION['ROL'] != 'visitante') {
				$this->view->usuario = '<script> window.location="' . $_SESSION['url'] . '"</script>';
			} else {
				$this->view->usuario = '[Visitante] ' . $_SESSION['USUARIO'];
			}
		} else {
			$this->view->usuario = '<script> window.location="' . URL . "home/login" . '"</script>';
		}

		$this->view->render('visitantes/register');
	}

	public function myvehicles(){

		session_start();
		if (isset($_SESSION['ROL'])) {
			if ($_SESSION['ROL'] != 'visitante') {
				$this->view->usuario = '<script> window.location="' . $_SESSION['url'] . '"</script>';
			} else {
				$this->view->usuario = '[Visitante] ' . $_SESSION['USUARIO'];
				$this->view->vehiculos =  $this->model->get_vehiculos($_SESSION['ID']) > 0 ? $this->model->get_vehiculos($_SESSION['ID']) : [];
			}
		} else {
			$this->view->usuario = '<script> window.location="' . URL . "home/login" . '"</script>';
		}

		$this->view->render('visitantes/myvehicles');
	}

	function registrar_vehiculo(){

		session_start();
		if (isset($_SESSION['ROL'])) {
			if ($_SESSION['ROL'] != 'visitante') {
				$this->view->usuario = '<script> window.location="' . $_SESSION['url'] . '"</script>';
			} else {
				$this->view->usuario = '[Visitante] ' . $_SESSION['USUARIO'];

				$validar = new Validaciones();
				$placa		= $validar->clear_string($_POST['placa']);
				$modelo 	= $validar->clear_string($_POST['modelo']) ? $_POST['modelo'] : "No especifica";

				if (is_null($placa)) {
					echo '¡Error! El campo "Placa" es obligatorio';
				} else {
					if ($this->model->placa_existe($placa)) {
						echo "El vehiculo ya se encuentra registrado, ¡verifique!";
					} else {
						$create = $this->model->create_vehiculo(
							[
								'PLACA' 	=> $placa,
								'MODELO' 	=> $modelo,
								'DUENO'		=> $_SESSION['ID']
							]
						);

						if ($create) {
							echo "<script> 	
							window.location='" . URL . "'; 
							alert('Registro DE VEHICULO exitoso');
							</script>";
						} else {
							echo "No se pudo registrar el vehiculo, intente nuevamente";
						}
					}
				}
			}
		} else {
			$this->view->usuario = '<script> window.location="' . URL . "home/login" . '"</script>';
		}
	}

	public function details($data = null){

		$validar = new Validaciones();
		session_start();
		if (isset($_SESSION['ROL'])) {
			if ($_SESSION['ROL'] != 'visitante') {
				$this->view->usuario = '<script> window.location="' . $_SESSION['url'] . '"</script>';
			} else {
				$this->view->usuario = '[Visitante] ' . $_SESSION['USUARIO'];
				$this->view->placa = $validar->clear_string($_GET['mla']) ? $validar->clear_string($_GET['mla']) : '<script> window.location="' . URL . '"</script>';
				$this->view->modelo = $_GET['mdl'] == 'NO ESPECIFICA' ? '' : $_GET['mdl'];
			}
		} else {
			$this->view->usuario = '<script> window.location="' . URL . "home/login" . '"</script>';
		}

		$this->view->render('visitantes/details');
	}

	public function delete(){

		$validar = new Validaciones();
		session_start();

		if (isset($_SESSION['ROL'])) {
			if ($_SESSION['ROL'] != 'visitante') {
				$this->view->usuario = '<script> window.location="' . $_SESSION['url'] . '"</script>';
			} else {
				$this->view->usuario = '[Visitante] ' . $_SESSION['USUARIO'];
				$_SESSION['RM_PLACA'] = $validar->clear_string($_GET['mla']) ? $validar->clear_string($_GET['mla']) : '<script> window.location="' . URL . '"</script>';
			}
		} else {
			$this->view->usuario = '<script> window.location="' . URL . "home/login" . '"</script>';
		}

		$this->view->render('visitantes/delete');
	}

	function actualizar_vehiculo(){

		session_start();
		if (isset($_SESSION['ROL'])) {
			if ($_SESSION['ROL'] != 'visitante') {
				$this->view->usuario = '<script> window.location="' . $_SESSION['url'] . '"</script>';
			} else {
				$this->view->usuario = '[Visitante] ' . $_SESSION['USUARIO'];

				$validar = new Validaciones();
				$placa		= $validar->clear_string($_POST['placa']);
				$modelo 	= $validar->clear_string($_POST['modelo']) ? $_POST['modelo'] : "NO ESPECIFICA";

				if (is_null($placa)) {
					echo '¡Error! El campo "Placa" es obligatorio';
				} else {
					if (!$this->model->placa_existe($placa)) {
						echo "No se encontró el registro a modificar, ¡verifique!";
					} else {
						$update = $this->model->update_vehiculo(
							[
								'PLACA' 	=> $placa,
								'MODELO' 	=> $modelo,
							]
						);

						if ($update) {
							echo "<script> 	
							window.location='" . URL . "'; 
							alert('Los datos se actualizaron correctamente!');
							</script>";
						} else {
							echo "No se pudieron actualizar los datos del vehiculo, intente nuevamente";
						}
					}
				}
			}
		} else {
			$this->view->usuario = '<script> window.location="' . URL . "home/login" . '"</script>';
		}
	}

	public function eliminar(){
		session_start();
		if (!empty($_SESSION['RM_PLACA'])) {

			$mla = $_SESSION['RM_PLACA'];
			unset($_SESSION['RM_PLACA']);

			$delete = $this->model->delete_vehiculo($mla);

			if ($delete) {
				echo "<script> 	
				window.location='" . URL . "'; 
				alert('Los datos se eliminaron correctamente!');
				</script>";
			} else {
				echo "No se pudieron eliminar los datos del vehiculo, intente nuevamente";
			}
		} else {
			$this->view->usuario = '<script> window.location="' . URL . '"</script>';
		}
	}
}

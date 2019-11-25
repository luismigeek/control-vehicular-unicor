<?php

include_once 'models/class/validaciones.php';

class vigilantes extends Controller
{
	function __construct()
	{
		parent::__construct();

		$this->view->usuario = '';
		$this->view->msg = '';
	}

	function render()
	{

		session_start();
		if (isset($_SESSION['ROL'])) {

			if ($_SESSION['ROL'] != 'vigilante') {
				$this->view->usuario = '<script> window.location="' . $_SESSION['url'] . '"</script>';
			} else {
				$this->view->usuario = '[Vigilante] ' . $_SESSION['USUARIO'];
			}
		} else {
			$this->view->usuario = '<script> window.location="' . URL . "home/login" . '"</script>';
		}

		$this->view->render('vigilantes/index');
	}

	public function entry()
	{
		session_start();
		if (isset($_SESSION['ROL'])) {

			if ($_SESSION['ROL'] != 'vigilante') {
				$this->view->usuario = '<script> window.location="' . $_SESSION['url'] . '"</script>';
			} else {
				$this->view->usuario = '[Vigilante] ' . $_SESSION['USUARIO'];
			}
		} else {
			$this->view->usuario = '<script> window.location="' . URL . "home/login" . '"</script>';
		}

		$this->view->render('vigilantes/entry');
	}

	public function moveon()
	{
		session_start();
		if (isset($_SESSION['ROL'])) {

			if ($_SESSION['ROL'] != 'vigilante') {
				$this->view->usuario = '<script> window.location="' . $_SESSION['url'] . '"</script>';
			} else {
				$this->view->usuario = '[Vigilante] ' . $_SESSION['USUARIO'];
			}
		} else {
			$this->view->usuario = '<script> window.location="' . URL . "home/login" . '"</script>';
		}

		$this->view->render('vigilantes/moveon');
	}

	public function guardar_entrada()
	{
		$validar = new Validaciones();
		session_start();
		if (isset($_SESSION['ROL'])) {

			if ($_SESSION['ROL'] != 'vigilante') {
				$this->view->usuario = '<script> window.location="' . $_SESSION['url'] . '"</script>';
			} else {
				$placa = $validar->clear_string($_POST['placa']);

				if (is_null($placa)) {
					echo "¡Error! Por favor ingrese la placa de su vehiculo";
				} else {
					if ($this->model->no_ha_salido($placa)) {
						echo "¡Error! El vehiculo que desea registrar aún no ha salido";
					} else {
						$veh = $this->model->get_vehiculo($placa);

						if (!is_array($veh)) {
							echo "Lo sentimos, no pudimos encontrar la matricula de su vehiculo en nuestra base de datos. Debe registrarse";
						} else {

							$entrada = $this->model->save_entry($veh);

							if (!$entrada) {
								echo "Lo sentimos, no se pudo registrar el ingreso de su vehiculo, intentelo nuevamente";
							} else {
								echo "<script> 	
								window.location='" . URL . "'; 
								alert('Registro de entrada exitoso');
							</script>";
							}
						}
					}
				}
			}
		} else {
			$this->view->usuario = '<script> window.location="' . URL . "home/login" . '"</script>';
		}
	}

	public function guardar_salida(){

		$validar = new Validaciones();
		
		session_start();
		if (isset($_SESSION['ROL'])) {

			if ($_SESSION['ROL'] != 'vigilante') {
				$this->view->usuario = '<script> window.location="' . $_SESSION['url'] . '"</script>';
			} else {

				# Validamos el formato de la placa, que esta tenga solo numeros y letras
				$placa = $validar->clear_string($_POST['placa']);

				# Verificamos que el campo no esté nulo
				if (is_null($placa)) {
					echo "¡Error! Por favor ingrese la placa de su vehiculo";
				} else {

					# Si no es nulo, obtenmos los datos relacionados con la placa
					$veh_in_parking = $this->model->get_vehiculo_in_park($placa);

					# Si no obtenemos un a arreglo con dichos datos, se mostrará error
					if (!is_array($veh_in_parking)) {
						echo "Lo sentimos, su vehiculo no se encuentra dentro del campus";
					} else {

						# Registramos la salida con los datos del vehiculo
						$salida = $this->model->save_moveon($veh_in_parking);

						# Si no se pudo efectuar la salida, se cierra el proceso
						if (!$salida) {
							echo "Lo sentimos, no se pudo registrar el su salida de su vehiculo, intentelo nuevamente";
						} else {
							echo "<script> 	
										window.location='" . URL . "'; 
										alert('Registro de salida exitoso');
									</script>";
						}
					}
				}
			}
		} else {
			$this->view->usuario = '<script> window.location="' . URL . "home/login" . '"</script>';
		}
	}

	public function vehiclesincampus()
	{
		session_start();
		if (isset($_SESSION['ROL'])) {

			if ($_SESSION['ROL'] != 'vigilante') {
				$this->view->usuario = '<script> window.location="' . $_SESSION['url'] . '"</script>';
			} else {
				$this->view->usuario = '[Vigilante] ' . $_SESSION['USUARIO'];
				$this->view->list_vehicles = is_array($this->model->get_vehiculos_in_campus()) ? $this->model->get_vehiculos_in_campus() : [];
			}
		} else {
			$this->view->usuario = '<script> window.location="' . URL . "home/login" . '"</script>';
		}

		$this->view->render('vigilantes/vehiclesincampus');
	}
}

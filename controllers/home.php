<?php

include_once 'models/class/validaciones.php';
include_once 'models/class/operaciones.php';

/**
 * Class Home (controlador) hereda/extiende 
 * de la clase Controller para adoptar el comportamiento 
 */

class Home extends Controller
{

	function __construct()
	{
		parent::__construct();

		/**
		 * Variables que guardan info 
		 * que se muestra en la vista
		 */
		$this->view->msg = '';
		$this->view->action = '';
	}

	/**
	 * Funcion que muestra la vista principal
	 * de la pagina - renderiza la vista
	 */
	function render()
	{
		session_start();

		if (!empty($_SESSION)) {
			$this->view->action = '<script> window.location="' . $_SESSION['URL'] . '"</script>';
		}

		$this->view->render('home/index');
	}


	/******************************************************************************************************** */
	/***************************************   VISTAS 	***************************************************** */
	/******************************************************************************************************** */

	/**
	 * Funcion encargada de mostrar la vista del
	 * login para iniciar sesion
	 */

	public function login()
	{

		/**
		 * Antes de mostrar la vista es necesario 
		 * verificar que no haya una sesión iniciada,
		 * de ser así se debe redireccionar a la 
		 * vista correspondiente a dicha sesión
		 */

		session_start();
		if (!empty($_SESSION)) {
			$this->view->action = '<script> window.location="' . $_SESSION['URL'] . '"</script>';
		}

		$this->view->render('home/login');
	}

	/**
	 * Funcion encargada de mostrar la vista del
	 * formulario de registro
	 */
	public function register()
	{
		session_start();
		if (!empty($_SESSION)) {
			$this->view->action = '<script> window.location="' . $_SESSION['URL'] . '"</script>';
		}
		$this->view->render('home/register');
	}

	/**
	 * Funcion encargada de mostrar la vista de
	 * la pagina para restablecer de la contraseña
	 */
	public function forgot_password()
	{
		session_start();
		if (!empty($_SESSION)) {
			$this->view->action = '<script> window.location="' . $_SESSION['URL'] . '"</script>';
		}
		$this->view->render('home/forgot_password');
	}

	/**
	 * Funcion encargada de mostrar la vista de la
	 * pagina para restablecer contraseña
	 */
	public function changepassword()
	{

		session_start();
		if (!empty($_SESSION)) {
			$this->view->action = '<script> window.location="' . $_SESSION['URL'] . '"</script>';
		}
		$this->view->render('home/changepassword');
	}


	/** *********************					*/
	/** *********************	PROCESOS		*/
	/** *********************					*/

	/**
	 * Funcion encargada de recibir los datos ingresados 
	 * en el formulario de inicio de sesion y autentica 
	 * la validez de estos para ordenar la creación de una 
	 * nueva sesion
	 */

	function iniciar()
	{

		$validar = new Validaciones();

		$username = $validar->clear_string($_POST['username']);
		$password = $validar->clear_string($_POST['password']);

		if (empty(trim($username))) {
			echo "El campo 'Username' no puede estar vacio";
		} else {
			if (empty(trim($password))) {
				echo "El campo 'Contraseña' no puede estar vacio";
			} else {
				$userdata = $this->model->autenticar(['username' => $username, 'password' => $password]);

				if (is_null($userdata)) {
					echo "¡No se puso autenticar, verifique sus datos!";
				} else {
					$this->model->iniciarsesion($userdata);
					echo "<script> 	
							window.location='" . $_SESSION['URL'] . "'; 
							alert('Sesión Iniciada');
						</script>";
				}
			}
		}
	}

	/**
	 * Función que al ser llamada ordena la destrucción una sesión activa
	 */
	function cerrar()
	{
		$this->model->cerrarsesion();
		header("location: " . URL);
	}


	/**
	 * Funcion encargada de recibir los datos ingresados 
	 * en el formulario de registro y da la orden de ingreso
	 * a los mismos en la base de datos
	 * 
	 * Retorna un mensaje de estado  
	 */

	function registro_personas()
	{
		/**
		 * Instancia de la clase 'Validaciones', para acceder
		 * a cada una de las funciones implementadas en 
		 * esta para las validaciones de los campos del
		 * formulario entre otros.
		 */
		$validar = new Validaciones();
		$operar = new Operaciones();

		$dni		= $validar->is_dni($_POST['dni']);
		$firstnames	= $validar->is_fullnames($_POST['firstnames']);
		$lastnames	= $validar->is_fullnames($_POST['lastnames']);
		$username	= $validar->usermame_requirements($_POST['username']);
		$password	= $validar->password_requirements($_POST['password']);
		$_password	= $validar->password_requirements($_POST['_password']);
		$email		= $validar->is_email($_POST['email']);
		$ocupation	= $validar->clear_string($_POST['ocupation']);

		if ($firstnames == null || $lastnames == null) {
			echo '¡Error! Verifique los campos: "Nombres" y "Apellidos"';
		} else {
			if ($dni == null) {
				echo '¡Error! Verifique el campo: "Numero de documento"';
			} else {
				if ($username == null) {
					echo '¡Error! Verifique el campo: "Nombre de usuario"';
				} else {
					if ($this->model->username_exist($username)) {
						echo 'El usuario "' . $username . '" ya está en uso';
					} else {
						if ($password != $_password) {
							echo 'Las contraseñas no coinciden';
						} else {
							if ($password == null) {
								echo '¡Error! Verifique el campo: "Contraseña"';
							} else {
								if ($email == null) {
									echo '¡Error! Verifique el campo: "Email"';
								} else {
									if ($ocupation == null) {
										echo '¡Error! Verifique el campo: "Ocupación"';
									} else {

										/**
										 * La contraseña digitada en el formulario es cifrada
										 * y se convierte en un hash, este ultimo es quien se 
										 * almacena en la base de datos
										 */
										$password_cifrado_bcrypt = $operar->cifrar_bcrypt($password);

										$create = $this->model->create_persona(
											[
												'dni' 		=> $dni,
												'firstnames' => $firstnames,
												'lastnames'	=> $lastnames,
												'email'		=> $email,
												'ocupation'	=> $ocupation
											]
										);

										$create_auth = $this->model->create_auth(
											[
												'dni' 		=> $dni,
												'user'		=> $username,
												'hash'		=> $password_cifrado_bcrypt
											]
										);

										if ($create && $create_auth) {
											echo "<script> 	
														window.location='" . URL . "'; 
														alert('Registro exitoso');
													</script>";
										} else {
											echo "Lo sentimos, no se pudo registrar el usuario.";
										}
									}
								}
							}
						}
					}
				}
			}
		}
	}



	/**
	 * Funcion encargada de generar un codigo de verificacion y 
	 * almacenarlo en la base de datos, este mismo tambien se envia
	 * al correo electronico de quien lo solicita
	 * 
	 * Retorna un mensaje de estado
	 */

	function codigo_verificacion()
	{

		$validar = new Validaciones();
		$operar = new Operaciones();

		$email = $validar->is_email($validar->clear_string($_POST['inputEmail']));

		if (is_null($email)) {
			echo "Por ingrese un correo electronico valido";
		} else {

			if (!$this->model->email_exist(['email' => $email])) {
				echo "No se encontró ninguna cuenta asociada con el email ingresado";
			} else {
				$userdata = $this->model->get_userdata(['email' => $email]);
				if (is_null($userdata)) {
					echo "No se encontró nombre de usuario asociado con el email ingresado";
				} else {

					# Generar codigo de verificacion a partir de algunos datos del usuario
					$code = $operar->generate_verification_code($userdata);

					# Insertar codigo de verificacion en la base de datos y levantar el acceso a cambio de contraseña
					$this->model->set_code_database(['id' => $userdata['id'], 'code' => $code]);

					# Asunto para mensaje
					$object = 'Codigo de verificacion para restableser contraseña';

					# URL para ingresar nueva contraseña
					$url = constant('URL') . 'home/changepassword/?id=' . $userdata['id'];

					# Cuerpo del mensaje
					$mensaje = 'Señor(a) ' . $userdata["user"] . ': <br><br> 
									Se ha solicitado restableser su contraseña. <br><br> 
									Para recupear su contraseña haga <a href="' . $url . '" target="_blank" rel="noopener noreferrer">click aquí</a> 
									o dirijase al enlace a continuación. Debe ingresar el codigo de verificacion. <br><br>
									Codigo de verificación: ' . $code . '<br>
									Enlace: ' . $url;

					if ($operar->send_email(['email' => $email, 'user' => $userdata['user'], 'object' => $object, 'mensaje' => $mensaje])) {
						echo "<script> 	
									window.location='" . URL . "'; 
									alert('Los directrices para recuperar su contraseña se han enviado a su correo electronico, feliz dia.');
								</script>";
					} else {
						echo 'Error al enviar el email, intentelo más tarde';
					}
				}
			}
		}
	}

	/**
	 * Funcion encargada de comprobar que el codigo de
	 * verificacion ingresado por el usuario sea acorde al 
	 * que se encuentra en la base de datos previamente 
	 * generado y almacenado
	 * 
	 * retorna un mensaje de estado 
	 */
	function cambiar_contrasena()
	{

		$validar = new Validaciones();
		$operar = new Operaciones();

		$id = $validar->clear_string($_POST['id']);
		$verificacionCode = $validar->clear_string($_POST['verificacionCode']);
		$password	= $validar->password_requirements($_POST['password']);
		$_password	= $validar->password_requirements($_POST['_password']);

		if ($password != $_password) {
			echo 'Las contraseñas no coinciden';
		} else {
			if (is_null($password)) {
				echo '¡Error! Verifique el campo: "Contraseña"';
			} else {

				/**
				 * Verificar que el usuario X haya solicitado restableser contraseña y que el codigo de
				 * verificacion sea acorde a éste
				 */

				$verify = $this->model->code_verification(['id' => $id, 'code' => $verificacionCode]);

				if (is_null($verify)) {
					echo "El codigo de verificación no es correcto, ingreselo nuevamente o solicite uno nuevo";
				} else {
					if ($verify) {

						$new_hash = $operar->cifrar_bcrypt($password);
						$req = $this->model->cambiar_contrasena(['id' => $id, 'new_hash' => $new_hash]);

						if (is_null($req)) {
							echo "No se pudo cambiar la contraseña, intentelo nuevamete";
						} else {
							echo "<script> 	
									window.location='" . URL . "'; 
								alert('Contraseña cambiada');
							</script>";
						}
					} else {
						echo "El usuario con identificacion " . $id . " no ha solicitado restablecer contraseña";
					}
				}
			}
		}
	}
}


/**
 * Falta utilizar AJAX para el recuperar contraseña
 */

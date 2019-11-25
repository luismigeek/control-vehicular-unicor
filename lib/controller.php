<?php

/**
 * La clase 'Controler' es padre de cada uno de los controladores que se cree, 
 * carga el modelo correspondiente al mismo. 
 */

class Controller
{

	function __construct()
	{
		$this->view = new View();
	}

	function loadModel($model)
	{
		$url = 'models/' . $model . 'Model.php';

		if (file_exists($url)) {
			require $url;
			$modelName = $model . 'Model';
			$this->model = new $modelName();
		}
	}
}

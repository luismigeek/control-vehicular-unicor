<?php

/**
 * La clase 'View' es padre de cada una de las vistas que se cree, 
 * carga una vista respectivamente. 
 */

class View
{
	function __construct()
	{ }

	function render($nombre)
	{
		require 'views/' . $nombre . '.php';
	}
}

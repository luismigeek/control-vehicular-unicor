<?php

class not_found extends Controller
{

	function __construct()
	{
		parent::__construct();

		$this->view->action = '';
	}

	function render()
	{
		$this->view->render("not_found/index");
	}
}

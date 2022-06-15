<?php

class indexController extends Controller
{
	private $_enlace;

	public function __construct(){
		$this->verificarSession();
		parent::__construct();
	}

	public function index()
	{

		$this->_view->assign('titulo', 'Portal de Noticias');

		$this->_view->renderizar('index');
	}

	#################################################
	public function validate($view)
	{

	}
}
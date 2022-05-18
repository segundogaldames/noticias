<?php

class errorController extends Controller
{
	public function __construct(){
		parent::__construct();
	}

	public function index(){}

	public function error()
	{
		$this->_view->assign('titulo','No encontrado');
		$this->_view->assign('title','Página no encontrada');

		$this->_view->renderizar('error');
	}

	public function validate($view)
	{

	}

}
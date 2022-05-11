<?php

class usuariosController extends Controller
{
    private $_usuario;

    public function __construct()
    {
        parent::__construct();
        $this->_usuario = $this->loadModel('usuario');
    }

    #mostrar la lista de usuarios del sistema
    public function index()
    {
        $this->_view->assign('titulo','Usuarios');
        $this->_view->assign('title','Lista de Usuarios');
        $this->_view->assign('usuarios', $this->_usuario->getUsuarios());

        $this->_view->renderizar('index');
    }

    ####################################################
    public function validate()
    {
    }
}

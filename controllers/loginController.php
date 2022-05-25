<?php

class loginController extends Controller
{
    private $_usuario;

    public function __construct()
    {
        parent::__construct();
        $this->_usuario = $this->loadModel('usuario');
    }

    public function index()
    {

    }

    public function login()
    {
        if (Session::get('autenticado')) {
            $this->redireccionar();
        }

        $this->_view->assign('titulo','Usuarios');
        $this->_view->assign('title','Iniciar Sessión');
        $this->_view->assign('enviar', CTRL);

        if ($this->getAlphaNum('enviar') == CTRL) {
            $usuario = $this->validate('login');

           if ($usuario) {
               Session::set('autenticado',true);
               Session::set('usuario_id', $usuario['id']);
               Session::set('usuario_nombre',$usuario['nombre']);
               Session::set('usuario_rol', $usuario['rol']);
               Session::set('tiempo', time());
           }

           $this->redireccionar();
        }

        $this->_view->renderizar('login');
    }

    public function logout()
    {
        Session::destroy();

        $this->redireccionar('login/login');
    }

    #######################################
    public function validate($view)
    {
        if (!$this->validarEmail($this->getPostParam('email'))) {
            $this->_view->assign('_error','Ingresa tu correo electrónico');
            $this->_view->renderizar($view);
            exit;
        }

        if (!$this->getSql('clave')) {
            $this->_view->assign('_error','Ingresa tu password');
            $this->_view->renderizar($view);
            exit;
        }

        $usuario = $this->_usuario->validarUsuario(
            $this->getPostParam('email'),
            $this->getSql('clave')
        );

        if (!$usuario) {
            $this->_view->assign('_error','El email o el password no están registrados');
            $this->_view->renderizar($view);
            exit;
        }else {
            return $usuario;
        }
    }
}

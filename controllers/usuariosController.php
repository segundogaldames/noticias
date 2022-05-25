<?php

class usuariosController extends Controller
{
    private $_usuario;
    private $_rol;

    public function __construct()
    {
        parent::__construct();
        $this->_usuario = $this->loadModel('usuario');
        $this->_rol = $this->loadModel('role');
    }

    #mostrar la lista de usuarios del sistema
    public function index()
    {
        $this->verificarMensajes();

        $this->_view->assign('titulo','Usuarios');
        $this->_view->assign('title','Lista de Usuarios');
        $this->_view->assign('usuarios', $this->_usuario->getUsuarios());

        $this->_view->renderizar('index');
    }

    public function view($id = null)
    {
        $this->validaUsuario($id);

        $this->_view->assign('titulo','Usuarios');
        $this->_view->assign('title','Detalle de Usuario');
        $this->_view->assign('usuario', $this->_usuario->getUsuarioId($this->filtrarInt($id)));

        $this->_view->renderizar('view');
    }

    public function edit($id = null)
    {
        $this->validaUsuario($id);

        $this->_view->assign('titulo','Usuarios');
        $this->_view->assign('title','Editar Usuario');
        $this->_view->assign('button','Editar');
        $this->_view->assign('usuario', $this->_usuario->getUsuarioId($this->filtrarInt($id)));
        $this->_view->assign('roles', $this->_rol->getRoles());
        $this->_view->assign('enviar', CTRL);//CSRF

        if ($this->getAlphaNum('enviar') == CTRL) {
            $this->validate('edit');

            #validamos que los datos ingresados sean nuevos
            $usuario = $this->_usuario->validaEdit(
                $this->getTexto('nombre'),
                $this->getPostParam('email'),
                $this->getSql('fecha_nacimiento'),
                $this->getInt('status'),
                $this->getInt('rol')
            );

            if ($usuario) {
                $this->_view->assign('_error','Modifique algunos de los datos para continuar');
                $this->_view->renderizar('edit');
                exit;
            }

            #editamos al usuario
            $usuario = $this->_usuario->editUsuario(
                $this->filtrarInt($id),
                $this->getTexto('nombre'),
                $this->getPostParam('email'),
                $this->getSql('fecha_nacimiento'),
                $this->getInt('status'),
                $this->getInt('rol')
            );

            if ($usuario) {
                Session::set('msg_success','El usuario se ha modificado correctamente');
            }else {
                Session::set('msg_error','El usuario no se ha modificado... intente nuevamente');
            }

            $this->redireccionar('usuarios/view/' , $this->filtrarInt($id));
        }

        $this->_view->renderizar('edit');
    }

    public function add()
    {
        $this->_view->assign('titulo','Usuarios');
        $this->_view->assign('title','Nuevo Usuario');
        $this->_view->assign('enviar', CTRL);
        $this->_view->assign('button','Guardar');
        $this->_view->assign('roles', $this->_rol->getRoles());

        if ($this->getAlphaNum('enviar') == CTRL) {
            $this->_view->assign('usuario', $_POST);

            $this->validate('add');

            #validar que el email ingresado no este registrado
            $usuario = $this->_usuario->getUsuarioEmail($this->getPostParam('email'));

            if ($usuario) {
                $this->_view->assign('_error','El usuario ingresado ya existe... intente con otro');
                $this->_view->renderizar('add');
                exit;
            }

            #registramos al usuario
            $usuario = $this->_usuario->addUsuario(
                $this->getTexto('nombre'),
                $this->getPostParam('email'),
                $this->getSql('fecha_nacimiento'),
                $this->getSql('clave'),
                $this->getInt('rol')
            );

            if ($usuario) {
                Session::set('msg_success','El usuario se ha registrado correctamente');
            }else {
                Session::set('msg_error','El usuario no se ha registrado... intente nuevamente');
            }

            $this->redireccionar('usuarios');
        }

        $this->_view->renderizar('add');
    }

    ####################################################
    public function validate($view)
    {
        if (!$this->getTexto('nombre')) {
            $this->_view->assign('_error','Ingrese el nombre del usuario');
            $this->_view->renderizar($view);
            exit;
        }

        if (!$this->validarEmail($this->getPostParam('email'))) {
            $this->_view->assign('_error','Ingrese el email del usuario');
            $this->_view->renderizar($view);
            exit;
        }

        if (!$this->getSql('fecha_nacimiento')) {
            $this->_view->assign('_error','Ingrese la fecha de nacimiento del usuario');
            $this->_view->renderizar($view);
            exit;
        }

        if (!$this->getInt('rol')) {
            $this->_view->assign('_error','Seleccione el rol del usuario');
            $this->_view->renderizar($view);
            exit;
        }

        if ($view == 'edit') {
            if (!$this->getInt('status')) {
                $this->_view->assign('_error','Seleccione el status del usuario');
                $this->_view->renderizar($view);
                exit;
            }
        }

        if ($view == 'add') {
            # code...
            if (!$this->getSql('clave') || strlen($this->getSql('clave')) < 8) {
                $this->_view->assign('_error','El password debe contener al menos 8 caracteres');
                $this->_view->renderizar($view);
                exit;
            }

            if ($this->getSql('clave') != $this->getSql('reclave')) {
                $this->_view->assign('_error','Los passwords ingresados no coinciden... intente nuevamente');
                $this->_view->renderizar($view);
                exit;
            }
        }

    }

    #########################################################
    private function validaUsuario($id)
    {
        if ($this->filtrarInt($id)) {
            $usuario = $this->_usuario->getUsuarioId($this->filtrarInt($id));

            if ($usuario) {
                return true;
            }
        }

        $this->redireccionar('usuarios');
    }
}

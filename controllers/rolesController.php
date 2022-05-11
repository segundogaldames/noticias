<?php

class rolesController extends Controller
{
	private $_role;
	private $_usuario;

	public function __construct(){
		parent::__construct();
		$this->_role = $this->loadModel('role');
	}

	public function index()
	{
		$this->verificarMensajes();

		$this->_view->assign('titulo', 'Roles');
		$this->_view->assign('title','Lista de Roles');
		$this->_view->assign('roles', $this->_role->getRoles());

		$this->_view->renderizar('index');
	}

	public function view($id = null)
	{
		$this->verificarRole($id);

		$this->_view->assign('titulo','Rol');
		$this->_view->assign('title','Detalle del Rol');
		$this->_view->assign('rol', $this->_role->getRoleId($this->filtrarInt($id)));
		$this->_view->renderizar('view');
	}

	public function edit($id = null)
	{
		$this->verificarRole($id);#verificamos que el rol recibido es valido

		$this->_view->assign('titulo','Editar Rol');
		$this->_view->assign('title','Editar Rol');
		$this->_view->assign('rol', $this->_role->getRoleId($this->filtrarInt($id)));
		$this->_view->assign('enviar', CTRL);

		if ($this->getAlphaNum('enviar') == CTRL) {

			if (!$this->getTexto('nombre')) {
				$this->_view->assign('_error','Ingrese el nombre del rol');
				$this->_view->renderizar('edit');
				exit;
			}

			#verificamos que el usuario hizo un cambio
			$rol = $this->_role->getRoleNombre($this->getTexto('nombre'));

			if ($rol) {
				$this->_view->assign('_error','El rol ingresado ya existe...modifique el nombre para continuar');
				$this->_view->renderizar('edit');
				exit;
			}

			#actualizar el rol en la tabla roles
			$rol = $this->_role->editRole(
				$this->filtrarInt($id),
				$this->getTexto('nombre')
			);

			if ($rol) {
				Session::set('msg_success','El rol se ha modificado correctamente');
			}else{
				Session::set('msg_error','El rol no se ha modificado... intente nuevamente');
			}

			$this->redireccionar('roles');
		}

		$this->_view->renderizar('edit');
	}

	public function add(){

		$this->_view->assign('titulo', 'Crear Roles');
		$this->_view->assign('title','Nuevo Rol');
		$this->_view->assign('enviar', CTRL);

		if ($this->getAlphaNum('enviar') == CTRL) {
			$this->_view->assign('datos', $_POST);

			if (!$this->getAlphaNum('nombre')) {
				$this->_view->assign('_error', 'Ingrese un nombre para el rol');
				$this->_view->renderizar('add');
				exit;
			}

			$row = $this->_role->getRoleNombre($this->getAlphaNum('nombre'));

			if ($row) {
				$this->_view->assign('_error', 'El rol ya existe, intente con otro nombre');
				$this->_view->renderizar('add');
				exit;
			}

			$row = $this->_role->addRoles(
				$this->getAlphaNum('nombre')
				);

			if ($row) {
				Session::set('msg_success', 'El rol se ha ingresado correctamente');
			}else{
				Session::set('msg_error', 'El rol no se ha registrado... inténtelo nuevamente');
			}

			$this->redireccionar('roles');
		}

		$this->_view->renderizar('add');
	}

	public function delete($id = null)
	{
		$this->verificarRole($id);

		$rol = $this->_role->deleteRole($this->filtrarInt($id));

		if ($rol) {
			Session::set('msg_success','El rol se ha eliminado correctamente');
		}else{
			Session::set('msg_error','El rol no se ha eliminado... intente nuevamente');
		}

		$this->redireccionar('roles');
	}

	###################################################################################################
	private function verificarRole($id){
		if (!$this->filtrarInt($id)) {
			$this->redireccionar('roles');
		}

		if (!$this->_role->getRoleId($this->filtrarInt($id))) {
			$this->redireccionar('roles');
		}
	}
}
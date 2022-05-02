<?php

class aclController extends Controller
{
	private $_aclm;

	public function __construct(){
		parent::__construct();
		$this->_aclm = $this->loadModel('acl');
	}

	public function index()
	{
		$this->_view->assign('titulo', 'Lista de acceso');
		$this->_view->renderizar('index');
	}

	public function roles()
	{
		$this->_view->assign('titulo', 'Administracion de roles');
		$this->_view->assign('roles', $this->_aclm->getRoles());
		$this->_view->renderizar('roles');
	}

	public function permisos_role($roleId)
	{
		$id = $this->filtrarInt($roleId);

		if(!$id):
			$this->redireccionar('acl/roles');
		endif;

		$row = $this->_aclm->getRole($id);

		if(!$row):
			$this->redireccionar('acl/roles');
		endif;

		$this->_view->assign('titulo', 'Administracion de permisos de role');

		if($this->getInt('guardar') == 1):
			$values = array_keys($_POST);
			$replace = array();
			$eliminar = array();
			
			for($i = 0;$i < count($values);$i++):
				if(substr($values[$i], 0, 5) == 'perm_'):
					if($_POST[$values[$i]] == 'x'):
						$eliminar[] = array(
							'roles' => $id,
							'permiso' => substr($values[$i],-1)
							);
					else:
						if($_POST[$values[$i]] == 1):
							$v = 1;
						else:
							$v = 0;
						endif;

						$replace[] = array(
							'roles' => $id,
							'permiso' => substr($values[$i],-1),
							'valor' => $v
							);
					endif;
				endif;
			endfor;

			for ($i = 0;$i < count($eliminar); $i++):
				$this->_aclm->eliminarPermisoRole(
					$eliminar[$i]['roles'],
					$eliminar[$i]['permiso']
					);
			endfor;

			for ($i = 0;$i < count($replace); $i++):
				$this->_aclm->editarPermisoRole(
					$replace[$i]['roles'],
					$replace[$i]['permiso'],
					$replace[$i]['valor']
					);
			endfor;
		endif;	

		$this->_view->assign('role', $row);
		$this->_view->assign('permisos', $this->_aclm->getPermisosRole($id));
		$this->_view->renderizar('permisos_role', 'acl');
	}
}
<?php

class categoriasController extends Controller
{
	private $_categoria;

	public function __construct(){
		$this->verificarSession();
		parent::__construct();
		$this->_categoria = $this->loadModel('categoria');
	}

	public function index()
	{
		$this->verificarMensajes();

		$this->_view->assign('titulo', 'Categorias');
		$this->_view->assign('title','Lista de Categorías');
		$this->_view->assign('categorias', $this->_categoria->getCategorias());

		$this->_view->renderizar('index');
	}

	public function view($id = null)
	{
		$this->verificarCategoria($id);
        $this->verificarMensajes();

		$this->_view->assign('titulo','Categorias');
		$this->_view->assign('title','Detalle de Categoría');
		$this->_view->assign('categoria', $this->_categoria->getCategoriaId($this->filtrarInt($id)));
		$this->_view->renderizar('view');
	}

	public function edit($id = null)
	{
		$this->verificarCategoria($id);#verificamos que el rol recibido es valido

		$this->_view->assign('titulo','Categorias');
		$this->_view->assign('title','Editar Categoría');
        $this->_view->assign('button','Editar');
        $this->_view->assign('ruta','categorias/');
		$this->_view->assign('categoria', $this->_categoria->getCategoriaId($this->filtrarInt($id)));
		$this->_view->assign('enviar', CTRL);

		if ($this->getAlphaNum('enviar') == CTRL) {

			$this->validate('edit');

			#actualizar el rol en la tabla roles
			$categoria = $this->_categoria->editCategoria(
				$this->filtrarInt($id),
				$this->getTexto('nombre')
			);

			if ($categoria) {
				Session::set('msg_success','La categoría se ha modificado correctamente');
			}else{
				Session::set('msg_error','La categoría no se ha modificado... intente nuevamente');
			}

			$this->redireccionar('categorias/view/' . $this->filtrarInt($id));
		}

		$this->_view->renderizar('edit');
	}

	public function add(){

		$this->_view->assign('titulo', 'Categorias');
		$this->_view->assign('title','Nueva Categoría');
        $this->_view->assign('button','Guardar');
        $this->_view->assign('ruta','categorias/');
		$this->_view->assign('enviar', CTRL);

		if ($this->getAlphaNum('enviar') == CTRL) {
			$this->_view->assign('categoria', $_POST);

			$this->validate('add');

			$categoria = $this->_categoria->addCategoria(
				$this->getAlphaNum('nombre')
				);

			if ($categoria) {
				Session::set('msg_success', 'La categoría se ha ingresado correctamente');
			}else{
				Session::set('msg_error', 'La categoría no se ha registrado... inténtelo nuevamente');
			}

			$this->redireccionar('categorias');
		}

		$this->_view->renderizar('add');
	}

	###################################################################################################
	private function verificarCategoria($id){
		if ($this->filtrarInt($id)) {
            $categoria = $this->_categoria->getCategoriaId($this->filtrarInt($id));

            if ($categoria) {
                return true;
            }
        }

        $this->redireccionar('categorias');
	}

	#metodo que permite la validacion de campos del formulario roles
	public function validate($view)
	{
		if (!$this->getAlphaNum('nombre')) {
			$this->_view->assign('_error', 'Ingrese un nombre para la categoría');
			$this->_view->renderizar('add');
			exit;
		}

		$categoria = $this->_categoria->getCategoriaNombre($this->getTexto('nombre'));

		if ($categoria) {
			$this->_view->assign('_error','La categoría ingresada ya existe...intente nuevamente');
			$this->_view->renderizar($view);
			exit;
		}
	}
}
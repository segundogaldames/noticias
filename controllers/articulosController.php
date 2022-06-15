<?php
class articulosController extends Controller
{
    private $_articulo;

    public function __construct()
    {
        $this->verificarSession();
        parent::__construct();
        $this->_articulo = $this->loadModel('articulo');
    }

    public function index()
    {
        $this->verificarMensajes();

        $this->_view->assign('titulo','Articulos');
        $this->_view->assign('title','Lista de Artículos');
        $this->_view->assign('articulos', $this->_articulo->getArticulos());

        $this->_view->renderizar('index');
    }

    public function add()
    {
        $this->_view->assign('titulo','Articulos');
        $this->_view->assign('title','Nuevo Artículo');
        $this->_view->assign('button','Guardar');
        $this->_view->assign('ruta','articulos/');
        $this->_view->assign('enviar', CTRL);

        if ($this->getAlphaNum('enviar') == CTRL) {
            $this->_view->assign('articulo', $_POST);

            $this->validate('add');

            $articulo = $this->_articulo->addArticulo(
                $this->getTexto('titulo'),
                $this->getTexto('descripcion')
            );

            if ($articulo) {
                Session::set('msg_success','El artículo se ha registrado correctamente');
            }else {
                Session::set('msg_error','El artículo no se ha registrado... intente nuevamente');
            }

            $this->redireccionar('articulos');
        }

        $this->_view->renderizar('add');
    }

    ###############################################
    public function validate($view = null)
    {
        if (!$this->getTexto('titulo')) {
            $this->_view->assign('_error','Ingrese el título del artículo');
            $this->_view->renderizar($view);
            exit;
        }

        if (!$this->getTexto('descripcion')) {
            $this->_view->assign('_error','Ingrese el descripción del artículo');
            $this->_view->renderizar($view);
            exit;
        }

        if ($view == 'edit') {
            # code...
        }else {
            $articulo = $this->_articulo->getArticuloTitulo($this->getTexto('titulo'));

            if ($articulo) {
                $this->_view->assign('_error','El artículo ingresado ya existe... intente con otro');
                $this->_view->renderizar($view);
                exit;
            }
        }
    }
}

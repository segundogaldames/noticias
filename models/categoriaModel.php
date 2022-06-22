<?php
/**
*
*/
class categoriaModel extends Model
{

	public function __construct(){
		parent::__construct();
	}

	public function getCategorias(){
		$cat = $this->_db->query("SELECT id, nombre FROM categorias ORDER BY id DESC");

		return $cat->fetchall();
	}

	public function getCategoriaNombre($nombre){
		$cat = $this->_db->prepare("SELECT id FROM categorias WHERE nombre = ?");
		$cat->bindParam(1, $nombre);
		$cat->execute();

		return $cat->fetch();
	}

	public function getCategoriaId($id){
		$id = (int) $id;

		$cat = $this->_db->prepare("SELECT id, nombre, created_at, updated_at FROM categorias WHERE id = ?");
		$cat->bindParam(1, $id);
		$cat->execute();

		return $cat->fetch();
	}

	public function getCategoriasArticulo($articulo)
	{
		$cat = $this->_db->prepare("SELECT c.id, c.nombre as categoria FROM articulo_categoria ac INNER JOIN categorias c ON ac.categoria_id = c.id WHERE ac.articulo_id = ? ORDER BY c.nombre");
		$cat->bindParam(1, $articulo);
		$cat->execute();

		return $cat->fetchall();
	}

	public function addCategoria($nombre){
		$cat = $this->_db->prepare("INSERT INTO categorias(nombre, created_at, updated_at) VALUES(?, now(), now())");
		$cat->bindParam(1, $nombre);
		$cat->execute();

		$row = $cat->rowCount();
		return $row;
	}

	public function editCategoria($id, $nombre){
		$id = (int) $id;

		$cat = $this->_db->prepare("UPDATE categorias SET nombre = ?, updated_at = now() WHERE id = ?");
		$cat->bindParam(1, $nombre);
		$cat->bindParam(2, $id);
		$cat->execute();

		$row = $cat->rowCount();
		return $row;
	}

	public function deleteCategoria($id){
		$id = (int) $id;

		$cat = $this->_db->prepare("DELETE FROM categorias WHERE id = ?");
		$cat->bindParam(1, $id);
		$cat->execute();

		$row = $cat->rowCount();
		return $row;
	}
}
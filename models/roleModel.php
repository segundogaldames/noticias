<?php
/**
*
*/
class roleModel extends Model
{

	public function __construct(){
		parent::__construct();
	}

	public function getRoles(){
		$rol = $this->_db->query("SELECT id, nombre FROM roles ORDER BY id DESC");

		return $rol->fetchall();
	}

	public function getRoleNombre($nombre){
		$rol = $this->_db->prepare("SELECT id FROM roles WHERE nombre = ?");
		$rol->bindParam(1, $nombre);
		$rol->execute();

		return $rol->fetch();
	}

	public function getRoleId($id){
		$id = (int) $id;

		$rol = $this->_db->prepare("SELECT id, nombre, created_at, updated_at FROM roles WHERE id = ?");
		$rol->bindParam(1, $id);
		$rol->execute();

		return $rol->fetch();
	}

	public function addRoles($nombre){
		$rol = $this->_db->prepare("INSERT INTO roles(nombre, created_at, updated_at) VALUES(?, now(), now())");
		$rol->bindParam(1, $nombre);
		$rol->execute();

		$row = $rol->rowCount();
		return $row;
	}

	public function editRole($id, $nombre){
		$id = (int) $id;

		$rol = $this->_db->prepare("UPDATE roles SET nombre = ? WHERE id = ?");
		$rol->bindParam(1, $nombre);
		$rol->bindParam(2, $id);
		$rol->execute();

		$row = $rol->rowCount();
		return $row;
	}

	public function deleteRole($id){
		$id = (int) $id;

		$rol = $this->_db->prepare("DELETE FROM roles WHERE id = ?");
		$rol->bindParam(1, $id);
		$rol->execute();

		$row = $rol->rowCount();
		return $row;
	}
}
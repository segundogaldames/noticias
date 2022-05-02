<?php 
/**
* 
*/
class contactoModel extends Model
{
	
	public function __construct(){
		parent::__construct();
	}

	public function getContactos(){
		$cont = $this->_db->query("SELECT c.id, c.nombre, c.email, c.asunto_id, c.created_at as creado, a.nombre as asunto, c.estado_id, c.modified_at as modificado FROM contactos as c INNER jOIN asuntos as a ON c.asunto_id = a.id ORDER BY creado DESC");
		
		return $cont->fetchall();
	}

	public function getContactoId($id){
		$id = (int) $id;
		
		$cont = $this->_db->prepare("SELECT c.id, c.nombre, c.email, c.asunto_id, c.created_at as creado, a.nombre as asunto, c.estado_id, c.modified_at as modificado, c.mensaje FROM contactos as c INNER jOIN asuntos as a ON c.asunto_id = a.id WHERE c.id = ?");
		$cont->bindParam(1, $id);
		$cont->execute();
		
		return $cont->fetch();
	}

	public function getContactoAsunto($asunto){
		$asunto = (int) $asunto;

		$cont = $this->_db->prepare("SELECT DISTINCT id, nombre, created_at as creado, estado_id FROM contactos WHERE asunto_id = ?");
		$cont->bindParam(1, $asunto);
		$cont->execute();

		return $cont->fetchall();
	}

	public function editContacto($id){
		$id = (int) $id;

		$cont = $this->_db->prepare("UPDATE contactos SET estado_id = 2, modified_at = now() WHERE id = ?");
		$cont->bindParam(1, $id);
		$cont->execute();

		$row = $cont->rowCount();
		return $row;
	}

	public function addContacto($nombre, $email, $asunto, $mensaje){
		$cont = $this->_db->prepare("INSERT INTO contactos VALUES(null, ?, ?, ?, ?, now(), 1, now())");
		$cont->bindParam(1, $nombre);
		$cont->bindParam(2, $email);
		$cont->bindParam(3, $asunto);
		$cont->bindParam(4, $mensaje);
		$cont->execute();

		$row = $cont->rowCount();
		return $row;
	}

	public function deleteContacto(){

	}
}
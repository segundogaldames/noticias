<?php

class usuarioModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    #listar usuarios considerando el rol de cada uno -> se usa join
    public function getUsuarios()
    {
        $usu = $this->_db->query("SELECT u.id, u.nombre, u.status, u.rol_id, r.nombre as rol FROM usuarios u INNER JOIN roles r ON u.rol_id = r.id ORDER BY u.id DESC");

        return $usu->fetchall();
    }

    public function getUsuarioId($id)
    {
        $usu = $this->_db->prepare('SELECT u.id, u.nombre, u.email, u.fecha_nacimiento, u.status, u.rol_id, r.nombre as rol, u.created_at, u.updated_at FROM usuarios u INNER JOIN roles r ON u.rol_id = r.id WHERE u.id = ?');
        $usu->bindParam(1, $id);
        $usu->execute();

        return $usu->fetch();
    }

    public function getUsuarioEmail($email)
    {
        $usu = $this->_db->prepare("SELECT id FROM usuarios WHERE email = ?");
        $usu->bindParam(1, $email);
        $usu->execute();

        return $usu->fetch();
    }

    public function validaEdit($nombre, $email, $fecha_nacimiento, $status, $rol)
    {
        $usu = $this->_db->prepare("SELECT id FROM usuarios WHERE nombre = ? AND email = ? AND fecha_nacimiento = ? AND status = ? AND rol_id = ?");
        $usu->bindParam(1, $nombre);
        $usu->bindParam(2, $email);
        $usu->bindParam(3, $fecha_nacimiento);
        $usu->bindParam(4, $status);
        $usu->bindParam(5, $rol);
        $usu->execute();

        return $usu->fetch();
    }

    public function addUsuario($nombre, $email, $fecha_nacimiento, $clave, $rol)
    {
        $clave = Hash::getHash('sha1', $clave, HASH_KEY);

        $usu = $this->_db->prepare("INSERT INTO usuarios(nombre, email, fecha_nacimiento, status, clave, rol_id, created_at, updated_at) VALUES(?, ?, ?, 1, ?, ?, now(), now())");
        $usu->bindParam(1, $nombre);
        $usu->bindParam(2, $email);
        $usu->bindParam(3, $fecha_nacimiento);
        $usu->bindParam(4, $clave);
        $usu->bindParam(5, $rol);
        $usu->execute();

        $row = $usu->rowCount();
        return $row;
    }

    public function editUsuario($id, $nombre, $email, $fecha_nacimiento, $status, $rol)
    {
        $usu = $this->_db->prepare("UPDATE usuarios SET nombre = ?, email = ?, fecha_nacimiento = ?, status = ?, rol_id = ?, updated_at = now() WHERE id = ?");
        $usu->bindParam(1, $nombre);
        $usu->bindParam(2, $email);
        $usu->bindParam(3, $fecha_nacimiento);
        $usu->bindParam(4, $status);
        $usu->bindParam(5, $rol);
        $usu->bindParam(6, $id);
        $usu->execute();

        $row = $usu->rowCount();
        return $row;
    }
}

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

    public function getUsuarioEmail($email)
    {
        $usu = $this->_db->prepare("SELECT id FROM usuarios WHERE email = ?");
        $usu->bindParam(1, $email);
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
}

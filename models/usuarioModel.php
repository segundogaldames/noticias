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
}

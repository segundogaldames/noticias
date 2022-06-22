<?php
class articuloModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getArticulos()
    {
        $art = $this->_db->query("SELECT a.id, a.titulo, a.status, u.nombre as usuario FROM articulos a INNER JOIN usuarios u ON a.usuario_id = u.id");

        return $art->fetchall();
    }

    public function getArticuloId($id)
    {
        $art = $this->_db->prepare("SELECT a.id, a.titulo, a.descripcion, a.status, a.created_at, a.updated_at, u.nombre as usuario FROM articulos a INNER JOIN usuarios u ON a.usuario_id = u.id WHERE a.id = ?");
        $art->bindParam(1, $id);
        $art->execute();

        return $art->fetch();
    }

    public function getArticuloTitulo($titulo)
    {
        $art = $this->_db->prepare("SELECT id FROM articulos WHERE titulo = ?");
        $art->bindParam(1, $titulo);
        $art->execute();

        return $art->fetch();
    }

    public function addArticulo($titulo, $descripcion)
    {
        $usuario = Session::get('usuario_id');

        $art = $this->_db->prepare("INSERT INTO articulos(titulo, descripcion, status, created_at, updated_at, usuario_id) VALUES(?, ?, 1, now(), now(), ?)");
        $art->bindParam(1, $titulo);
        $art->bindParam(2, $descripcion);
        $art->bindParam(3, $usuario);
        $art->execute();

        $row = $art->rowCount();
        return $row;
    }

    public function editArticulo($id, $titulo, $descripcion, $status)
    {
        $usuario = Session::get('usuario_id');

        $art = $this->_db->prepare("UPDATE articulos SET titulo = ?, descripcion = ?, status = ?, updated_at = now(), usuario_id = ? WHERE id = ?");
        $art->bindParam(1, $titulo);
        $art->bindParam(2, $descripcion);
        $art->bindParam(3, $status);
        $art->bindParam(4, $usuario);
        $art->bindParam(5, $id);
        $art->execute();

        $row = $art->rowCount();
        return $row;
    }
}

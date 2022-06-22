<?php
class articuloCategoriaModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    #verificar que un articulo no esta asociado a una misma categoria
    public function getArticuloCategoria($articulo, $categoria)
    {
        $acat = $this->_db->prepare("SELECT id FROM articulo_categoria WHERE articulo_id = ? AND categoria_id = ?");
        $acat->bindParam(1, $articulo);
        $acat->bindParam(2, $categoria);
        $acat->execute();

        return $acat->fetch();
    }

    public function addArticuloCategoria($articulo, $categoria)
    {
        $acat = $this->_db->prepare("INSERT INTO articulo_categoria(articulo_id, categoria_id, created_at, updated_at) VALUES(?, ?, now(), now() )");
        $acat->bindParam(1, $articulo);
        $acat->bindParam(2, $categoria);
        $acat->execute();

        $row = $acat->rowCount();
        return $row;
    }
}

<form action="" method="post">
    <div class="card-body">
        <div class="form-group">
            <label for="exampleInputEmail1">Título</label>
            <input type="text" name="titulo" value="{$articulo.titulo|default:""}" class="form-control" id=""
                placeholder="Título del artículo">
        </div>
        <div class="form-group">
            <label for="descricpion">Descripción</label>
            <textarea name="descripcion" class="form-control" rows="4" style="resize:none" placeholder="Descripción del artículo">
                {$articulo.descripcion|default:""}
            </textarea>
        </div>

        <div class="card-footer">
            <input type="hidden" name="enviar" value="{$enviar}">
            <button type="submit" class="btn btn-outline-dark">Guardar</button>
        </div>
    </div>
</form>
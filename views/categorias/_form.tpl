<form action="" method="post">
    <div class="card-body">
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" value="{$categoria.nombre|default:""}" class="form-control" id="" placeholder="Nombre de la categoría">
        </div>
        <div class="card-footer">
            <input type="hidden" name="enviar" value="{$enviar}">
            <button type="submit" class="btn btn-outline-dark">{$button}</button>
            <a href="{$_layoutParams.root}{$ruta}" class="btn btn-outline-primary">Cancelar</a>
        </div>
    </div>
</form>
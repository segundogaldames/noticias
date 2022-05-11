<form action="" method="post">
    <div class="card-body">
        <div class="form-group">
            <label for="exampleInputEmail1">Nombre</label>
            <input type="text" name="nombre" value="{$rol.nombre|default:""}" class="form-control" id=""
                placeholder="Nombre del rol">
        </div>

        <div class="card-footer">
            <input type="hidden" name="enviar" value="{$enviar}">
            <button type="submit" class="btn btn-outline-dark">Guardar</button>
        </div>
    </div>
</form>
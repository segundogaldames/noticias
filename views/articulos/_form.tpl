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
        {if $button == 'Editar'}
            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" class="form-control">
                    <option value="{$articulo.status}">
                        {if $articulo.status == 1}
                            Pendiente
                        {elseif $articulo.status == 2}
                            En Revisión
                        {else}
                            Publicado
                        {/if}
                    </option>

                    <option value="">Seleccione...</option>
                    <option value="1">Pendiente</option>
                    <option value="2">En revisión</option>
                    <option value="3">Publicado</option>

                </select>
            </div>
        {/if}
        <div class="card-footer">
            <input type="hidden" name="enviar" value="{$enviar}">
            <button type="submit" class="btn btn-outline-dark">{$button}</button>
            <a href="{$_layoutParams.root}{$ruta}" class="btn btn-outline-primary">Cancelar</a>
        </div>
    </div>
</form>
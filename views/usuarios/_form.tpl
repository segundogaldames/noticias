<form action="" method="post">
    <div class="card-body">
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" value="{$usuario.nombre|default:""}" class="form-control" id=""
                placeholder="Nombre del usuario">
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" value="{$usuario.email|default:""}" class="form-control" placeholder="Email del usuario">
        </div>
        <div>
            <label for="fecha">Fecha de nacimiennto</label>
            <input type="date" name="fecha_nacimiento" value="{$usuario.fecha_nacimiento|default:""}" class="form-control" placeholder="Fecha de nacimiento">
        </div>
        <div>
            <label for="rol">Rol</label>
            <select name="rol" class="form-control">
                {if $button == 'Editar'}
                    <option value="{$usuario.rol_id}">{$usuario.rol}</option>
                {/if}
                <option value="">Seleccione...</option>
                {foreach from=$roles item=rol}
                    <option value="{$rol.id}">{$rol.nombre}</option>
                {/foreach}
            </select>
        </div>
        {if $button == 'Editar'}
            <div>
                <label for="status">Status</label>
                <select name="status" class="form-control">
                    {if $usuario.status == 1}
                        <option value="{$usuario.status}">Activo</option>
                        <option value="2">Desactivar</option>
                    {else}
                        <option value="{$usuario.status}">Inactivo</option>
                        <option value="1">Activar</option>
                    {/if}
                </select>
            </div>
        {/if}
        {if $button == 'Guardar'}
            <div>
                <label for="clave">Password</label>
                <input type="password" name="clave" class="form-control" placeholder="Password del usuario" onpaste="return false">
            </div>
            <div>
                <label for="reclave">Confirmar password</label>
                <input type="password" name="reclave" class="form-control" placeholder="Confirmar password" onpaste="return false">
            </div>
        {/if}
        <div class="card-footer">
            <input type="hidden" name="enviar" value="{$enviar}">
            <button type="submit" class="btn btn-outline-dark">{$button}</button>
        </div>
    </div>
</form>
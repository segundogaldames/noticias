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
                <option value="">Seleccione...</option>
                {foreach from=$roles item=rol}
                    <option value="{$rol.id}">{$rol.nombre}</option>
                {/foreach}
            </select>
        </div>
        <div>
            <label for="clave">Password</label>
            <input type="password" name="clave" class="form-control" placeholder="Password del usuario" onpaste="return false">
        </div>
        <div>
            <label for="reclave">Confirmar password</label>
            <input type="password" name="reclave" class="form-control" placeholder="Confirmar password" onpaste="return false">
        </div>
        <div class="card-footer">
            <input type="hidden" name="enviar" value="{$enviar}">
            <button type="submit" class="btn btn-outline-dark">Guardar</button>
        </div>
    </div>
</form>
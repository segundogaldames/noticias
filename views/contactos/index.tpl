<div id="sites">
    <div class="col-md-8 col-md-offset-2">
        <h3>Contactos</h3>
        {if isset($contactos) && count($contactos)}
            <table class="table table-hover">
                <tr>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Asunto</th>
                    <th>Creado</th>
                    <th>Estado</th>
                    <th></th>
                </tr>
                {foreach from=$contactos item=c}
                    <tr>
                        <td>{$c.nombre}</td>
                        <td>{$c.email}</td>
                        <td>{$c.asunto}</td>
                        <td>{$c.creado|date_format:'%d-%m-%Y %H:%M'}</td>
                        <td>{if $c.estado_id==1}Pendiente{else}Procesado{/if}</td>
                        <td>
                            <a href="{$_layoutParams.root}contactos/view/{$c.id}">Ver</a>
                        </td>
                    </tr>
                {/foreach}
            </table>
        {else}
            <p class="text-info">No hay contactos registrados</p>
        {/if}
        <a href="{$_layoutParams.root}admin" class="btn btn-link">Administración</a>
    </div>
</div>
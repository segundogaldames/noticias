<div id="tf-contact">
  <div class="container">
    <div class="section-title">
      <h3>Contáctanos</h3>
      <p>Llena los campos del formulario para comunicarte con nosotros ante cualquier inquietud que tengas.</p>
      <p class="text-danger">* Campos obligatorios</p>
      <hr>
    </div>

    <div class="space"></div>

    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <form id="contact" action="" method="post">
          <div class="form-group">
            <label>Nombre <span class="text-danger">*</span></label>
            <input type="text" name="nombre" class="form-control" id="exampleInputEmail1" placeholder="Tu nombre completo" value="{$datos.nombre|default:""}">
          </div>
          <div class="form-group">
            <label>Email <span class="text-danger">*</span></label>
            <input type="email" class="form-control" id="exampleInputPassword1" placeholder="Tu correo electrónico" name="email" value="{$datos.email|default:""}">
          </div>
          <div class="form-group">
            <label>Asunto <span class="text-danger">*</span></label>
            <select name="asunto" class="form-control" style="height: 50px">
              <option value="">Seleccione</option>
              {if isset($asuntos) && count($asuntos)}
                {foreach from=$asuntos item=as}
                  <option value="{$as.id}">{$as.nombre}</option>
                {/foreach}
              {/if}
            </select>
          </div>
          <div class="form-group">
            <label>Mensaje <span class="text-danger">*</span></label>
            <textarea class="form-control" rows="4" placeholder="Mensaje" name="mensaje">{$datos.nombre|default:""}</textarea>
          </div>
          <div class="form-group">
            <input type="hidden" name="enviar" value="{$enviar}">
            <input type="submit" value="Enviar" class="btn btn-success my-btn dark">
            <a href="{$_layoutParams.root}index" class="btn btn-primary">Cancelar</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>



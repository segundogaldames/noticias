<script type="text/javascript">
	function mostrar(){
		document.getElementById('tf-contact').style.display ='block';
	}
</script>
<div id="sites">
	<div class="col-md-8 col-md-offset-2">
		<h3>Ver Contacto</h3>
		<table class="table table-hover">
			<tr>
				<th>Nombre:</th>
				<td>{ucwords($contacto.nombre)}</td>
			</tr>
			<tr>
				<th>Email:</th>
				<td>{$contacto.email}</td>
			</tr>
			<tr>
				<th>Asunto:</th>
				<td>{$contacto.asunto}</td>
			</tr>
			<tr>
				<th>Fecha de Recepción:</th>
				<td>{$contacto.creado|date_format:'%d-%m-%Y %H:%M'}</td>
			</tr>
			<tr>
				<th>Estado:</th>
				<td>{if $contacto.estado_id==1}Pendiente{else}Procesado{/if}</td>
			</tr>
			<tr>
				<th>Fecha de Proceso:</th>
				<td>{$contacto.modificado|date_format:'%d-%m-%Y %H:%M'}</td>
			</tr>
			<tr>
				<th>Mensaje:</th>
				<td>{ucfirst($contacto.mensaje)}</td>
			</tr>
		</table>
		<p>
			<a href="#" class="btn btn-primary my-btn dark" id="contactar" onclick="mostrar();">Contactar</a>
			{if $contacto.estado_id==1}
			<a href="{$_layoutParams.root}contactos/edit/{$contacto.id}" class="btn btn-success">Cambiar Estado</a>
			{/if}
			<a href="{$_layoutParams.root}asuntos" class="btn btn-link">Asuntos</a>
			<a href="{$_layoutParams.root}contactos" class="btn btn-link">Contactos</a>
		</p>
		<hr>
	</div>
</div>
<div id="tf-contact" style="display: none;">
    <div class="space"></div>
    <div class="row">
      	<div class="col-md-6 col-md-offset-3">
	        <form id="contact" action="" method="post">
	          	<div class="form-group">
	           	<label>Respuesta<span class="text-danger">*</span></label>
	          		<textarea name="respuesta" class="form-control" rows="5" style="resize: none;"></textarea>
	          	</div>
	         	 	<div class="form-group">
		            <input type="hidden" name="enviar" value="{$enviar}">
		            <input type="hidden" name="nombre" value="{$contacto.nombre}">
		            <input type="hidden" name="email" value="{$contacto.email}">
		            <input type="hidden" name="asunto" value="{$contacto.asunto}">
		            <input type="submit" value="Enviar" class="btn btn-success my-btn dark">
		            <a href="{$_layoutParams.root}usuarios" class="btn btn-link">Volver</a>
	          	</div>
	        </form>
      	</div>
    </div>
</div>
	
	


	
	
	

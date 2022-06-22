<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{$title}
                    </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Artículos</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{$title}</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body p-0">
                {include file="../partials/_mensajes.tpl"}

                <form action="" method="post">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="articulo">{$articulo.titulo}</label>
                        </div>
                        <div class="form-group">
                            <label for="categoria">Categoría</label>
                            <select name="categoria" class="form-control">

                                <option value="">Seleccione...</option>
                                {foreach from=$categorias item=categoria}
                                    <option value="{$categoria.id}">{$categoria.nombre}</option>
                                {/foreach}

                            </select>
                        </div>

                        <div class="card-footer">
                            <input type="hidden" name="enviar" value="{$enviar}">
                            <button type="submit" class="btn btn-outline-dark">Agregar</button>
                            <a href="{$_layoutParams.root}articulos" class="btn btn-outline-primary">Cancelar</a>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
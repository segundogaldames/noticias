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

                <table class="table table-hover">
                    <tr>
                        <th>Título:</th>
                        <td>{$articulo.titulo}</td>
                    </tr>
                    <tr>
                        <th>Descripción:</th>
                        <td>{$articulo.descripcion}</td>
                    </tr>
                    <tr>
                        <th>Autor(a):</th>
                        <td>{$articulo.usuario}</td>
                    </tr>
                    <tr>
                        <th>Status:</th>
                        <td>
                            {if $articulo.status == 1}
                                Pendiente
                            {elseif $articulo.status == 2}
                                En Revisión
                            {else}
                                Publicado
                            {/if}
                        </td>
                    </tr>
                    <tr>
                        <th>Fecha de creación:</th>
                        <td>{$articulo.created_at|date_format:"%d-%m-%Y %H:%M:%S"}</td>
                    </tr>
                    <tr>
                        <th>Fecha de actualización</th>
                        <td>{$articulo.updated_at|date_format:"%d-%m-%Y %H:%M:%S"}</td>
                    </tr>
                </table>
                <p>
                    <a href="{$_layoutParams.root}articulos" class="btn btn-success">Volver</a>
                </p>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
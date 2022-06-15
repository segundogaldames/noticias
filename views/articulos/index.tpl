<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{$title} <a href="{$_layoutParams.root}articulos/add" class="btn btn-outline-dark">Nuevo Artículo</a>
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

                {if isset($articulos) && count($articulos)}
                    <table class="table table-hover projects table-responsive">
                        <thead>
                            <tr>
                                <th style="width: 10%">
                                    Id
                                </th>
                                <th style="width: 25%">
                                    Título
                                </th>
                                <th style="width: 25%;">Status</th>
                                <th style="width: 25;">Creado por</th>
                                <th style="width: 15%;">
                                    Acciones
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            {foreach from=$articulos item=articulo}
                                <tr>
                                    <td>
                                        {$articulo.id}
                                    </td>
                                    <td>{$articulo.titulo}</td>
                                    <td>
                                        {if $articulo.status == 1}
                                            Pendiente
                                        {elseif $articulo == 2}
                                            En Revisión
                                        {else}
                                            Publicado
                                        {/if}
                                    </td>
                                    <td>{$articulo.usuario}</td>
                                    <td>
                                        <a class="btn btn-success btn-sm" href="{$_layoutParams.root}articulos/view/{$articulo.id}">
                                            <i class="fas fa-folder">
                                            </i>
                                            View
                                        </a>
                                        <a class="btn btn-warning btn-sm" href="{$_layoutParams.root}articulos/edit/{$articulo.id}">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Edit
                                        </a>
                                    </td>
                                </tr>
                            {/foreach}

                        </tbody>
                    </table>
                {else}
                    <p class="text-info ml-2">No hay artículos registrados</p>
                {/if}
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
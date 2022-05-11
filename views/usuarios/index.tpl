<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{$title} <a href="{$_layoutParams.root}usuarios/add" class="btn btn-outline-dark">Nuevo Usuario</a>
                    </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">
                            <a href="{$_layoutParams.root}roles">Roles</a>
                        </li>
                        <li class="breadcrumb-item active">Usuarios</li>
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

                {if isset($usuarios) && count($usuarios)}
                    <table class="table table-striped table-hover projects">
                        <thead>
                            <tr>
                                <th style="width: 10%">
                                    Id
                                </th>
                                <th style="width: 60%">
                                    Nombre
                                </th>
                                <th>Status</th>
                                <th>Rol</th>
                                <th style="width: 30%;">
                                    Acciones
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            {foreach from=$usuarios item=usuario}
                                <tr>
                                    <td>
                                        {$usuario.id}
                                    </td>
                                    <td>{$usuario.nombre}</td>
                                    <td>
                                        {if $usuario.status == 1}
                                            Activo
                                        {else}
                                            Inactivo
                                        {/if}
                                    </td>
                                    <td>{$usuario.rol}</td>
                                    <td>
                                        <a class="btn btn-primary btn-sm" href="{$_layoutParams.root}usuarios/view/{$usuario.id}">
                                            <i class="fas fa-folder">
                                            </i>
                                            View
                                        </a>
                                        <a class="btn btn-info btn-sm" href="{$_layoutParams.root}usuarios/edit/{$usuario.id}">
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
                    <p class="text-info ml-2">No hay usuarios registrados</p>
                {/if}
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
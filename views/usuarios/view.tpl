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

                <table class="table table-hover">
                    <tr>
                        <th>Nombre:</th>
                        <td>{$usuario.nombre}</td>
                    </tr>
                    <tr>
                        <th>Email:</th>
                        <td>{$usuario.email}</td>
                    </tr>
                    <tr>
                        <th>Fecha de nacimiento:</th>
                        <td>{$usuario.fecha_nacimiento|date_format:"%d-%m-%Y"}</td>
                    </tr>
                    <tr>
                        <th>Status:</th>
                        <td>
                            {if $usuario.status == 1}
                                Activo
                            {else}
                                Inactivo
                            {/if}
                        </td>
                    </tr>
                    <tr>
                        <th>Rol:</th>
                        <td>{$usuario.rol}</td>
                    </tr>
                    <tr>
                        <th>Fecha de creación:</th>
                        <td>{$usuario.created_at|date_format:"%d-%m-%Y %H:%M:%S"}</td>
                    </tr>
                    <tr>
                        <th>Fecha de modificcación:</th>
                        <td>{$usuario.updated_at|date_format:"%d-%m-%Y %H:%M:%S"}</td>
                    </tr>
                </table>

            </div>
            <!-- /.card-body -->
        </div>
        <p>
            <a href="{$_layoutParams.root}usuarios" class="btn btn-success btn-sm">Volver</a>
        </p>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
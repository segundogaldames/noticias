<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{$titulo|default:"Sin Titulo"}</title>
  <meta name="description" content="Your Description Here">
  <meta name="keywords" content="bootstrap themes, portfolio, responsive theme">
  <!-- Favicons
    ================================================== -->
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{$_layoutParams.ruta_plugins}fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet"
    href="{$_layoutParams.ruta_plugins}tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="{$_layoutParams.ruta_plugins}icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{$_layoutParams.ruta_plugins}jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{$_layoutParams.ruta_dist}css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{$_layoutParams.ruta_plugins}overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{$_layoutParams.ruta_plugins}daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="{$_layoutParams.ruta_plugins}summernote/summernote-bs4.min.css">

  {if isset($_layoutParams.js) && count($_layoutParams.js)}
    {foreach item=js from=$_layoutParams.js}
      <script type="text/javascript" src="{$js}"></script>
    {/foreach}

  {/if}

</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    {include file="menu.tpl"}
    {include file="sidebar.tpl"}


      <noscript>
        <p>Debe tener el soporte de Javascript habilitado</p>
      </noscript>


      {include file=$_contenido}


    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    {include file="footer.tpl"}
  </div>
  <!-- jQuery -->
  <script src="{$_layoutParams.ruta_plugins}jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="{$_layoutParams.ruta_plugins}jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="{$_layoutParams.ruta_plugins}bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="{$_layoutParams.ruta_plugins}chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="{$_layoutParams.ruta_plugins}sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  <script src="{$_layoutParams.ruta_plugins}jqvmap/jquery.vmap.min.js"></script>
  <script src="{$_layoutParams.ruta_plugins}jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="{$_layoutParams.ruta_plugins}jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="{$_layoutParams.ruta_plugins}moment/moment.min.js"></script>
  <script src="{$_layoutParams.ruta_plugins}daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="{$_layoutParams.ruta_plugins}tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="{$_layoutParams.ruta_plugins}summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="{$_layoutParams.ruta_plugins}overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="{$_layoutParams.ruta_dist}js/adminlte.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="{$_layoutParams.ruta_dist}js/demo.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="{$_layoutParams.ruta_dist}js/pages/dashboard.js"></script>
</body>

</html>
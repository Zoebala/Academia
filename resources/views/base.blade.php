@include("portions.entete")
{{-- <body class="hold-transition sidebar-mini"> --}}
<div class="wrapper">
  <!-- Navbar -->
        @include("portions.Nav")
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
        @include("portions.Menu")

  <!-- Content Wrapper. Contains page content -->
  {{-- style="background:url('images/bgc2.jpg');" --}}
    <div class="content-wrapper" style="background:url('dist/img/bg3.jpeg');">
        <!-- Content Header (Page header) -->
            @include("portions.headerpage")

        <!-- Main content -->
            <section class="content">
                @yield("content")
            </section>
        <!-- /.content -->
    </div>
  <!-- /.content-wrapper -->

@include("portions.footer")
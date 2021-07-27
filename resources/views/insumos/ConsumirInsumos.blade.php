<!DOCTYPE html>
<html lang="es">

    <head>
        <title>consumir insumos</title>
        @include('layouts.head')
    </head>

    <body id="page-top">

        <!-- Page Wrapper -->
        <div id="wrapper">

            <!-- Sidebar -->
            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
                @include('layouts.sidebar.sidebar_part1')
                @include('layouts.sidebar.modulos.seguridad')        
                @include('layouts.sidebar.modulos.insumos')
                <li class="nav-item active">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree"
                       aria-expanded="true" aria-controls="collapseThree">
                        <span>Productos</span>
                    </a>
                    <div id="collapseThree" class="collapse show" aria-labelledby="headingThree" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" id="lvlinactive" href="RegistrarProducto">Registrar producto</a>
                            <a class="collapse-item active" id="lvlactive" href="ConsumirInsumo">Consumir insumo</a>
                            <a class="collapse-item" id="lvlinactive" href="AgregarProducto">Agregar a stock</a>
                        </div>
                    </div>
                </li>
                @include('layouts.sidebar.modulos.ventas')        
                @include('layouts.sidebar.modulos.contabilidad')        
                @include('layouts.sidebar.sidebar_part2')
            </ul>
            <!-- End of Sidebar -->

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">

                    <!-- Topbar -->
                      <nav class="navbar navbar-expand navbar-light topbar mb-4 static-top shadow"  id="mytopbar">
                        @include('layouts.topbar')
                    </nav>
                    <!-- End of Topbar -->

                    <!-- Begin Page Content -->
                    <div class="container-fluid">




                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                @include('layouts.footer')
                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->


        @include('layouts.bootstrap')

    </body>

</html>
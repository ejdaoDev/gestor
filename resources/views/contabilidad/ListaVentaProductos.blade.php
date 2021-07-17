<!DOCTYPE html>
<html lang="es">

    <head>
        <title>Lista venta productos</title>
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
                @include('layouts.sidebar.modulos.productos')        
                @include('layouts.sidebar.modulos.ventas')     
                <li class="nav-item active">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFive"
                       aria-expanded="true" aria-controls="collapseFive">
                        <span>Contabilidad</span>
                    </a>
                    <div id="collapseFive" class="collapse show" aria-labelledby="headingFive" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="ListaIngresosInsumos">Ingresos de Insumos</a>
                            <a class="collapse-item" href="ListaConsumoInsumos">Consumo de Insumos</a>
                            <a class="collapse-item" href="ListaIngresoProductos">Ingreso de Productos</a>
                            <a class="collapse-item active" href="ListaVentaProductos">Venta de Productos</a>
                        </div>
                    </div>
                </li>
                @include('layouts.sidebar.sidebar_part2')
            </ul>
            <!-- End of Sidebar -->

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">

                    <!-- Topbar -->
                    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                       
                        @include('layouts.topbar')

                    </nav>
                    <!-- End of Topbar -->


                    <!-- Begin Page Content -->
                    <div class="container-fluid">
                        @include('exits.contabilidadExits')
                        @include('errors.contabilidadErrors')





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
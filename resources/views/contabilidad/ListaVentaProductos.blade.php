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
                            <a class="collapse-item" id="lvlinactive" href="ListaIngresosInsumos">Ingresos de Insumos</a>
                            <a class="collapse-item" id="lvlinactive" href="ListaConsumoInsumos">Consumo de Insumos</a>
                            <a class="collapse-item" id="lvlinactive" href="ListaIngresoProductos">Ingreso de Productos</a>
                            <a class="collapse-item active" id="lvlactive" href="ListaVentaProductos">Venta de Productos</a>
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
                       <nav class="navbar navbar-expand navbar-light topbar mb-4 static-top shadow"  id="mytopbar">
                       
                        @include('layouts.topbar')

                    </nav>
                    <!-- End of Topbar -->


                    <!-- Begin Page Content -->
                    <div class="container-fluid">
                        @include('exits.contabilidadExits')
                        @include('errors.contabilidadErrors')
                        
                        
                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">                    
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Valor</th>
                                                <th>Fecha Ingreso</th>
                                                <th>Agregado por</th>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Id</th>
                                                <th>Valor</th>
                                                <th>Fecha Ingreso</th>
                                                <th>Agregado por</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            @foreach ($ventas as $venta)
                                            <tr>
                                                  <td> <a id="btn-car" class="btn btn-user btn-block" style="width: 50px;" href="ListaVentaProductos!={{$venta->id}}">+</a></td>
                                                <td>{{number_format($venta->valorpago)}} $</td>
                                                <td>{{$venta->created}}</td>
                                                <td>{{$venta->usuario->prinom}} {{$venta->usuario->priape}}</td>                                             
                                            </tr>        
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>








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
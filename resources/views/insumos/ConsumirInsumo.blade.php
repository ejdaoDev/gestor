<!DOCTYPE html>
<html lang="es">

    <head>
        <title>consumir insumo</title>
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
                        @include('exits.insumosExits')
                        @include('errors.insumosErrors')

                        <div class="card shadow mb-4">                    
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Nombre</th>
                                                <th>Stock</th>
                                                <th>cantidad</th>
                                                <th>Presentación</th>
                                                <th>Sustraer</th>                                                
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Nombre</th>
                                                <th>Stock</th>
                                                <th>Cantidad</th>
                                                <th>Presentación</th>
                                                <th>Sustraer</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            @foreach($insumos as $insumo)
                                            <tr>
                                        <form class="form-horizontal" method="POST" action="ConsumirInsumo">{{csrf_field()}}
                                            <td>{{$insumo->nombre}}</td>
                                            <td>{{$insumo->stock}} 
                                                @if($insumo->medida_id == 1)
                                                KG(S)
                                                @endif
                                                @if($insumo->medida_id == 2)
                                                UD(S)
                                                @endif</td>
                                            <td>                                                    

                                                <div class="col-sm-6 mb-3 mb-sm-0">
                                                    <input type="hidden" class="form-control" name="id" value="{{$insumo->id}}">
                                                    <input type="text" class="form-control" name="cantidad" maxlength="11" onkeyup="format(this)" onchange="format(this)" value="{{ old('cantidad') }}" required>
                                                </div>

                                            </td>

                                            <td>
                                                <select name="presentacion" class="form-control" required>                                                        
                                                    @if($insumo->medida_id == 1)
                                                    @foreach($presentaciones_1 as $presentacion)
                                                    <option value ="{{$presentacion->id}}">{{$presentacion->nombre}}</option>
                                                    @endforeach
                                                    @endif
                                                    @if($insumo->medida_id == 2)
                                                    @foreach($presentaciones_2 as $presentacion)
                                                    <option value ="{{$presentacion->id}}">{{$presentacion->nombre}}</option>
                                                    @endforeach
                                                    @endif
                                                </select>
                                            </td>

                                            <td><button class="btn btn-danger btn-user btn-block" type="submit"><i class="fas fa-chevron-down"></i></button></td>
                                        </form>
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
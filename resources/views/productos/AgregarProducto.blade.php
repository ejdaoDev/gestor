<!DOCTYPE html>
<html lang="es">

    <head>
        <title>Agregar producto</title>
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
                            <a class="collapse-item" id="lvlinactive" href="ModificarProducto">Modificar producto</a>
                            <a class="collapse-item" id="lvlinactive" href="ConsumirInsumo">Consumir insumo</a>
                            <a class="collapse-item active" id="lvlactive" href="AgregarProducto">Agregar a stock</a>
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
                          <button id="btn-car" style="width:  100px;" class="btn btn-primary btn-user btn-block" onclick = "location = 'AgregarProductos'">{{$count}} In list</button>
                        @include('layouts.topbar')
                        
                    </nav>
                    <!-- End of Topbar -->


                    <!-- Begin Page Content -->
                    <div class="container-fluid">
                       @include('exits.productosExits')
                        @include('errors.productosErrors')


                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">                    
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Nombre</th>
                                                <th>cantidad</th>
                                                <th>Presentación</th>
                                                <th>Añadir</th>                                                
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Nombre</th>
                                                <th>Cantidad</th>
                                                <th>Presentación</th>
                                                <th>Añadir</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            @foreach($productos as $producto)
                                            <tr>
                                        <form class="form-horizontal" method="POST" action="AgregarProducto">{{csrf_field()}}
                                            <td>{{$producto->nombre}}</td>
                                            <td>                                                    

                                                <div class="col-sm-6 mb-3 mb-sm-0">
                                                    <input type="hidden" class="form-control" name="id" value="{{$producto->id}}">
                                                    <input type="text" class="form-control" name="cantidad" maxlength="11" onkeyup="format(this)" onchange="format(this)" value="{{ old('cantidad') }}" required>
                                                </div>

                                            </td>
                                            <td>
                                                <select name="presentacion" class="form-control" required>                                                        
                                                    @if($producto->medida_id == 1)
                                                    @foreach($presentaciones_1 as $presentacion)
                                                    <option value ="{{$presentacion->id}}">{{$presentacion->nombre}}</option>
                                                    @endforeach
                                                    @endif
                                                    @if($producto->medida_id == 2)
                                                    @foreach($presentaciones_2 as $presentacion)
                                                    <option value ="{{$presentacion->id}}">{{$presentacion->nombre}}</option>
                                                    @endforeach
                                                    @endif
                                                </select>
                                            </td>

                                            <td><button id="btn-car" class="btn btn-user btn-block" type="submit"><i class="fas fa-plus"></i></button></td>
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
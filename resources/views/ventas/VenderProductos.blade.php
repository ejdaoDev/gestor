<!DOCTYPE html>
<html lang="es">

    <head>
        <title>vender productos</title>
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
                <li class="nav-item active">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFour"
                       aria-expanded="true" aria-controls="collapseFour">
                        <span>Ventas</span>
                    </a>
                    <div id="collapseFour" class="collapse show" aria-labelledby="headingFour" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item active" href="VenderProducto">Vender productos</a>
                        </div>
                    </div>
                </li>
                @include('layouts.sidebar.modulos.contabilidad')        
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
                        @include('exits.productosExits')
                        @include('errors.productosErrors')

                        <div class="card shadow mb-4">                    
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Nombre</th>
                                                <th>Cantidad</th>
                                                <th>V. Unidad</th>
                                                <th>V. Total</th>
                                                <th>Modificar</th>
                                                <th></th>
                                                <th>Eliminar</th>                                                
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Nombre</th>
                                                <th>Cantidad</th>
                                                <th>V. Unidad</th>
                                                <th>V. Total</th>
                                                <th>Modificar</th>
                                                <th></th>
                                                <th>Eliminar</th>   
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            @foreach($productos as $producto)
                                            <tr>
                                        
                                            <td>{{$producto->producto->nombre}}</td>
                                            <td>{{$producto->cantidad}} {{$producto->presentacion->abreviacion}}</td>
                                            <td>{{number_format($producto->val_unit)}}$</td>
                                            <td>{{number_format($producto->val_total)}}$</td>
                                            <td>
                                                <form class="form-horizontal" method="post" action="ModifyProducto/{{$producto->id}}">{{csrf_field()}}
                                                    <div class="form-group row">
                                                        <div >
                                                            <input type="text" class="form-control" name="cantidad" maxlength="11" onkeyup="format(this)" onchange="format(this)" style="width: 100px; margin-left: 5px;" value="{{$producto->cantidad}}" maxlength="70" required autofocus>
                                                        </div>
                                                        <div class="col-sm-6 mb-3 mb-sm-0">

                                                            <select name="presentacion" style="width: 150px" class="form-control" required>                                                                    
                                                                @if($producto->medida_id == 1)
                                                                @foreach($presentaciones_1 as $presentacion)
                                                                @if($presentacion->id == $producto->presentacion->id)
                                                                <option value ="{{$presentacion->id}}" selected>{{$presentacion->abreviacion}}</option>
                                                                @endif
                                                                @if($presentacion->id != $producto->presentacion->id)
                                                                <option value ="{{$presentacion->id}}">{{$presentacion->abreviacion}}</option>
                                                                @endif
                                                                @endforeach
                                                                @endif
                                                                @if($producto->medida_id == 2)
                                                                @foreach($presentaciones_2 as $presentacion)
                                                                @if($presentacion->id == $producto->presentacion->id)
                                                                <option value ="{{$presentacion->id}}" selected>{{$presentacion->abreviacion}}</option>
                                                                @endif
                                                                @if($presentacion->id != $producto->presentacion->id)
                                                                <option value ="{{$presentacion->id}}">{{$presentacion->abreviacion}}</option>
                                                                @endif
                                                                @endforeach
                                                                @endif
                                                            </select>
                                                        </div>  
                                                    </div>  
                                            </td>
                                            <td>                                                    
                                                <button class="btn btn-primary btn-user btn-block" style="width: 50px;" type="submit">+</button>
                                                </form> 
                                        </td>


                                        <td><button class="btn btn-danger btn-user btn-block" href="DeleteProducto/{{$producto->id}}"  onclick="location = 'DeleteProducto/{{$producto->id}}'" type="button">-</button></td>
                                       
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    <center>
                                        <form class="form-horizontal" method="POST" action="AgregarInsumos">{{csrf_field()}}
                                            <input disabled="true" type="text" class="form-control" name="total" style="width: 180px; margin-left: 25px; margin-bottom: 10px;" maxlength="11" onkeyup="format(this)" onchange="format(this)" value="${{number_format($total)}}" required>                 
                                            <button class="btn btn-success btn-user btn-block" style="width: 180px; margin-left: 25px" type="submit">Generar Factura</button>                                      
                                            <button class="btn btn-danger btn-user btn-block" style="width: 180px; margin-left: 25px" type="button" data-toggle="modal" data-target="#CleanListModal">Limpiar Lista</button>
                                        </form>
                                    </center>
                                </div>
                            </div>
                        </div>
                        
                        <!-- CleanList Modal-->
                        <div class="modal fade" id="CleanListModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">¿Seguro?</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">Selecciona "Limpiar" si estas seguro de querer descartar todos los items de la lista</div>
                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                                        <a class="btn btn-danger" href="DeleteProductos" onclick = "location = 'DeleteProductos'">Limpiar</a>               
                                    </div>
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
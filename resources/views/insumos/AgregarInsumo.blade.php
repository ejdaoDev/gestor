<!DOCTYPE html>
<html lang="es">

    <head>
        <title>Agregar insumo</title>
        @include('layouts.head')
    </head>

    <body id="page-top">

        <!-- Page Wrapper -->
        <div id="wrapper">

            <!-- Sidebar -->
            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
                @include('layouts.sidebar.sidebar_part1')
                @include('layouts.sidebar.modulos.seguridad')
                <li class="nav-item active">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                       aria-expanded="true" aria-controls="collapseTwo">
                        <span>Insumos</span>
                    </a>
                    <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="RegistrarInsumo">Registrar insumo</a>
                            <a class="collapse-item" href="ModificarInsumo">Modificar insumo</a>
                            <a class="collapse-item active" href="AgregarInsumo">Agregar  a stock</a>
                        </div>
                    </div>
                </li>
                @include('layouts.sidebar.modulos.productos')        
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
                    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                        <button style="width:  100px;" class="btn btn-primary btn-user btn-block" onclick = "location = 'AgregarInsumos'">{{$count}} In list</button>
                        @include('layouts.topbar')
                        
                    </nav>
                    <!-- End of Topbar -->


                    <!-- Begin Page Content -->
                    <div class="container-fluid">
                        @include('exits.insumosExits')
                        @include('errors.insumosErrors')


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
                                                <th></th>
                                                <th></th>

                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Nombre</th>
                                                <th>Cantidad</th>
                                                <th>Presentación</th>
                                                <th>Añadir</th>
                                                <th></th>
                                                <th></th>

                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            @foreach($insumos as $insumo)
                                            <tr>
                                        <form class="form-horizontal" method="POST" action="AgregarInsumo">{{csrf_field()}}
                                            <td>{{$insumo->nombre}}</td>
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

                                            <td><button class="btn btn-primary btn-user btn-block" type="submit">+</button></td>
                                            <td></td>
                                            <td></td>
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
<!DOCTYPE html>
<html lang="es">

    <head>
        <title>modificar insumo</title>
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
                            <a class="collapse-item active" href="ModificarInsumo">Modificar insumo</a>
                            <a class="collapse-item" href="AgregarInsumo">Agregar a stock</a>
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
                                                <th style="width: 300px">Nombre</th>
                                                <th style="width: 100px">Medida</th>
                                                <th style="width: 100px"></th>
                                                <th style="width: 1px"></th>
                                                <th style="width: 1px"></th>
                                                <th style="width: 1px"></th>                                                
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th style="width: 300px">Nombre</th>
                                                <th style="width: 100px">Medida</th>
                                                <th style="width: 100px"></th>
                                                <th style="width: 1px"></th>
                                                <th style="width: 1px"></th>
                                                <th style="width: 1px"></th>
                                            </tr>
                                        </tfoot>                                        
                                        @foreach($insumos as $insumo)                                            
                                        <tr>
                                        <form class="form-horizontal" method="POST" action="ModificarInsumo">{{csrf_field()}}
                                            <td>
                                                <div class="form-group">
                                                    <input type="hidden" name="id" value="{{$insumo->id}}">
                                                    <input type="text" class="form-control" name="nombre" style="width: 300px" value="{{$insumo->nombre}}" maxlength="70" required autofocus>
                                                </div>
                                            <td>
                                                <div class="form-group">
                                                    <select name="medida" style="width: 150px" class="form-control" required>
                                                        @if($insumo->medida_id == 1)
                                                        <option value ="1" selected>PESO</option>
                                                        <option value ="2">UNIDAD</option>
                                                        @endif
                                                        @if($insumo->medida_id == 2)
                                                        <option value ="1">PESO</option>
                                                        <option value ="2" selected>UNIDAD</option>
                                                        @endif
                                                    </select>
                                                </div>
                                            </td>
                                            <td><button type="submit" class="btn btn-success btn-user btn-block" style="width: 150px">Modificar</button></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>   
                                        </form>
                                        </tr>                                   
                                        @endforeach

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
<!DOCTYPE html>
<html lang="es">

    <head>
        <title>registrar insumo</title>
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
                            <a class="collapse-item active" href="RegistrarInsumo">Registrar insumo</a>
                            <a class="collapse-item" href="ModificarInsumo">Modificar insumo</a>
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
                        <div class="col-lg-4" style="margin: 0 auto;">
                            <form class="form-horizontal" method="POST" action="RegistrarInsumo">{{csrf_field()}} 

                                @include('exits.insumosExits')
                                @include('errors.insumosErrors')
                                @if(count($errors)>0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach($errors->all() as $error)
                                        {{$error}}
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                                <div class="form-group">
                                    Nombre del insumo:
                                    <input type="text" class="form-control" name="nombre"  value="{{ old('nombre') }}" maxlength="70" required autofocus>
                                </div>                                                               
                                <div class="form-group">
                                    El insumo se mide por:
                                    <select name="medida" class="form-control" required>
                                    <option selected disabled hidden style='display: none' value=''></option>
                                    <option value ="1">PESO</option>
                                    <option value ="2">UNIDAD</option>
                                </select>
                                </div>
                                <button class="btn btn-success btn-user btn-block" type="submit">registrar</button>

                                <hr>

                            </form>

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
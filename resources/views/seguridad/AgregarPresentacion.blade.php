<!DOCTYPE html>
<html lang="es">

    <head>
        <title>Agregar presentacion</title>
        @include('layouts.head')
    </head>

    <body id="page-top">

        <!-- Page Wrapper -->
        <div id="wrapper">

            <!-- Sidebar -->
            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
                @include('layouts.sidebar.sidebar_part1')
                <li class="nav-item active">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne"
                       aria-expanded="true" aria-controls="collapseOne">
                        <span>Seguridad</span>
                    </a>
                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" id="lvlinactive" href="RegistrarUsuario">Registrar usuario</a>
                            <a class="collapse-item" id="lvlinactive" href="ModificarUsuario">Modificar usuario</a>
                            <a class="collapse-item active" id="lvlactive" href="AgregarPresentacion">Agregar presentacion</a>
                        </div>
                    </div>
                </li>      
                @include('layouts.sidebar.modulos.insumos')        
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
                       <nav class="navbar navbar-expand navbar-light topbar mb-4 static-top shadow"  id="mytopbar">
                        @include('layouts.topbar')
                    </nav>
                    <!-- End of Topbar -->

                    <!-- Begin Page Content -->
                    <div class="container-fluid">
                        <div class="col-lg-4" style="margin: 0 auto;">
                            <form class="form-horizontal" method="POST" action="AgregarPresentacion">{{csrf_field()}} 

                                @include('exits.seguridadExits')
                                @include('errors.seguridadErrors')
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
                                    Tipo de Medida
                                <select name="medida" class="form-control">
                                    <option selected disabled hidden style='display: none' value=''></option>                                  
                                    <option value ="1">PESO</option>
                                    <option value ="2">UNIDAD</option>                                   
                                </select>
                                </div>
                                <div class="form-group">
                                    Nombre
                                    <input type="text" class="form-control" name="nombre"  value="{{ old('nombre') }}" maxlength="50" required autofocus>
                                </div>
                                <div class="form-group">
                                    Factor Multiplicativo
                                    <input type="text" class="form-control" name="multfactor"  value="{{ old('multfactor') }}" required autofocus>
                                </div>
                                <div class="form-group">
                                    Abreviación
                                    <input type="text" class="form-control" name="abrev"  value="{{ old('abrev') }}" maxlength="20" required autofocus>
                                </div>
                                <button id="btn-primary" class="btn btn-user btn-block" type="submit">Registrar</button>
                                <button id="btn-secondary" class="btn btn-user btn-block" type="reset">Limpiar</button>

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
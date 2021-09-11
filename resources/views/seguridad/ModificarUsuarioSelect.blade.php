<!DOCTYPE html>
<html lang="es">

    <head>
        <title>Modificar usuario</title>
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
                            <a class="collapse-item active" id="lvlactive" href="ModificarUsuario">Modificar usuario</a>
                            <a class="collapse-item" id="lvlinactive" href="AgregarPresentacion">Agregar presentacion</a>
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
                            <form class="form-horizontal" method="POST" action="ModificarUsuario!={{$usuario->id}}">{{csrf_field()}} 

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
                                    Identificación*
                                    <input type="text" class="form-control" name="numide"  value="{{$usuario->numide}}" maxlength="20" required autofocus>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        Primer nombre*
                                        <input type="text" class="form-control" name="prinom" maxlength="50" value="{{$usuario->prinom}}" required>
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        Segundo nombre
                                        <input type="text" class="form-control" maxlength="50" name="secnom" value="{{$usuario->secnom}}"></div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        Primer apellido*
                                        <input type="text" class="form-control" name="priape" maxlength="50" value="{{$usuario->priape}}" required>
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        Segundo apellido
                                        <input type="text" class="form-control" name="secape" maxlength="50" value="{{$usuario->secape}}"></div>
                                </div>                               
                                <div class="form-group">
                                    Rol*
                                <select name="rol" class="form-control">                                    
                                    @foreach ($roles as $rol)
                                    @if($rol->id == $usuario->rol_id)
                                    <option selected value ="{{$rol->id}}">{{$rol->nombre}}</option>
                                    @endif
                                    @if($rol->id != $usuario->rol_id)
                                    <option value ="{{$rol->id}}">{{$rol->nombre}}</option>
                                    @endif                                   
                                    @endforeach
                                </select>
                                </div>
                                
                                  
                                <div class="form-group">
                                    Email*
                                    <input type="email" class="form-control" name="email" value="{{$usuario->email}}" maxlength="100" required autofocus>
                                </div>          

                                <button id="btn-primary" class="btn btn-user btn-block" type="submit">Modificar</button>

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
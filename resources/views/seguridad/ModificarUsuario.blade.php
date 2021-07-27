<!DOCTYPE html>
<html lang="es">

    <head>
        <title>modificar usuario</title>
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


                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">                    
                            <div class="card-body">
                                @include('exits.seguridadExits')
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Identidad</th>
                                                <th>Nombres</th>
                                                <th>Apellidos</th>
                                                <th>Email</th>
                                                <th>Rol</th>
                                                <th style="width: 110px;">recuperar password</th>
                                                <th style="width: 60px;">Cambiar estado</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Identidad</th>
                                                <th>Nombres</th>
                                                <th>Apellidos</th>
                                                <th>Email</th>
                                                <th>Rol</th>
                                                <th style="height: 110px;">recuperar password</th>
                                                <th style="width: 60px;">Cambiar estado</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            @foreach($usuarios as $usuario)
                                            <tr>
                                                <th scope="row"><a href="ModificarUsuario/{{$usuario->id}}">{{$usuario->numide}}</a></th>
                                                <td>{{$usuario->prinom}}</td>
                                                <td>{{$usuario->priape}}</td>
                                                <td>{{$usuario->email}}</td>
                                                <td>{{$usuario->rol->nombre}}</td>
                                                <td><a href="resetPassword/{{$usuario->id}}"> <img src="images/reset.png" style="width: 100px; height: 50px; margin-left: 10px;"></td>
                                                @if($usuario->active == true)      
                                                <td><a href="inactivateUser/{{$usuario->id}}"> <img src="images/activo.png" style="width: 60px; height: 50px; margin-left: 10px;"></td>
                                                @endif
                                                @if($usuario->active == false)      
                                                <td><a href="activateUser/{{$usuario->id}}"> <img src="images/inactivo.png" style="width: 60px; height: 50px; margin-left: 10px;"></td>
                                                @endif
                                            
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
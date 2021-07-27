<!DOCTYPE html>
<html lang="es">

    <head>
        <title>recuperar contraseña</title>
        @include('layouts.head')
    </head>

    <body id="page-top">

        <!-- Page Wrapper -->
        <div id="wrapper">

            <!-- Sidebar -->
            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">



            </ul>
            <!-- End of Sidebar -->

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">

                    <!-- Topbar -->
                       <nav class="navbar navbar-expand navbar-light topbar mb-4 static-top shadow"  id="mytopbar">
                        <b style="color: red;">Su contraseña en este momento es muy vulnerable, necesita cambiarla</b>
                    </nav>
                    <!-- End of Topbar -->

                    <!-- Begin Page Content -->
                    <div class="container-fluid">
                        <div class="col-lg-4" style="margin: 0 auto;">
                            <form class="form-horizontal" method="POST" action="RestablecerPassword">{{csrf_field()}} 






                                <br>
                                <br>
                                @if(Session::has('error1'))
                                <div class="alert alert-danger alert-dismissible" role="success">
                                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</button>
                                    <b>{{Session::get('error1')}}</b>
                                </div>
                                @endif
                                @if(Session::has('error2'))
                                <div class="alert alert-danger alert-dismissible" role="success">
                                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</button>
                                    <b>{{Session::get('error2')}}</b>
                                </div>
                                @endif


                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        password*
                                        <input type="password" class="form-control" name="password" maxlength="20" required>
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        Confirmar password*
                                        <input type="password" class="form-control" name="password_confirmation" maxlength="20" required></div>
                                </div>          

                                <button class="btn btn-success btn-user btn-block" type="submit">cambiar password</button>

                                <hr>

                            </form>

                        </div>


                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                <footer class="sticky-footer bg-white">                    
                </footer>
                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->


        @include('layouts.bootstrap')

    </body>

</html>
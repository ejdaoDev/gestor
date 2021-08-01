@if(auth()->user()->rol_id == 1)
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne"
       aria-expanded="true" aria-controls="collapseOne">
        <span>Seguridad</span>
    </a>
    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" id="lvlinactive" href="RegistrarUsuario">Registrar usuario</a>
            <a class="collapse-item" id="lvlinactive" href="ModificarUsuario">Modificar usuario</a>
            <a class="collapse-item" id="lvlinactive" href="AgregarPresentacion">Agregar presentacion</a>
        </div>
    </div>
</li>
@endif
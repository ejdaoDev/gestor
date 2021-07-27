@if(auth()->user()->rol_id == 1 | auth()->user()->rol_id == 2)
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
       aria-expanded="true" aria-controls="collapseTwo">
        <span>Insumos</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" id="lvlinactive" href="RegistrarInsumo">Registrar insumo</a>
            <a class="collapse-item" id="lvlinactive" href="ModificarInsumo">Modificar insumo</a>
            <a class="collapse-item" id="lvlinactive" href="AgregarInsumo">Agregar  a stock</a>
        </div>
    </div>
</li>
@endif
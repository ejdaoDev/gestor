@if(auth()->user()->rol_id == 1 | auth()->user()->rol_id == 3)
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree"
       aria-expanded="true" aria-controls="collapseThree">
        <span>Productos</span>
    </a>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" id="lvlinactive" href="RegistrarProducto">Registrar producto</a>
            <a class="collapse-item" id="lvlinactive" href="ModificarProducto">Modificar producto</a>
            <a class="collapse-item" id="lvlinactive" href="ConsumirInsumo">Consumir insumo</a>
            <a class="collapse-item" id="lvlinactive" href="AgregarProducto">Agregar a stock</a>
        </div>
    </div>
</li>
@endif
@if(auth()->user()->rol_id == 1 | auth()->user()->rol_id == 2 | auth()->user()->rol_id == 3 | auth()->user()->rol_id == 4)
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFive"
       aria-expanded="true" aria-controls="collapseFive">
        <span>Contabilidad</span>
    </a>
    <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            @if(auth()->user()->rol_id == 1 | auth()->user()->rol_id == 2)
            <a class="collapse-item" id="lvlinactive" href="ListaIngresosInsumos">Ingresos de Insumos</a>
            @endif
            @if(auth()->user()->rol_id == 1 | auth()->user()->rol_id == 3)
            <a class="collapse-item" id="lvlinactive" href="ListaConsumoInsumos">Consumo de Insumos</a>
            <a class="collapse-item" id="lvlinactive" href="ListaIngresoProductos">Ingreso de Productos</a>
            @endif
            @if(auth()->user()->rol_id == 1 | auth()->user()->rol_id == 4)
            <a class="collapse-item" id="lvlinactive" href="ListaVentaProductos">Venta de Productos</a>
            @endif
        </div>
    </div>
</li>
@endif
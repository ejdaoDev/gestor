@if(auth()->user()->rol_id == 1)
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFive"
       aria-expanded="true" aria-controls="collapseFive">
        <span>Contabilidad</span>
    </a>
    <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="ListaIngresosInsumos">Ingresos de Insumos</a>
            <a class="collapse-item" href="ListaConsumoInsumos">Consumo de Insumos</a>
            <a class="collapse-item" href="ListaIngresoProductos">Ingreso de Productos</a>
            <a class="collapse-item" href="ListaVentaProductos">Venta de Productos</a>
        </div>
    </div>
</li>
@endif
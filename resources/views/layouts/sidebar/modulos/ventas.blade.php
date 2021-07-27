@if(auth()->user()->rol_id == 1 | auth()->user()->rol_id == 4)
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFour"
       aria-expanded="true" aria-controls="collapseFour">
        <span>Ventas</span>
    </a>
    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" id="lvlinactive" href="VenderProducto">Vender productos</a>
        </div>
    </div>
</li>
@endif
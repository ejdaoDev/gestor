@if(Session::has('tienedecimal'))
<div class="alert alert-danger alert-dismissible" role="success">
    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</button>
    <b>{{Session::get('tienedecimal')}}</b>
</div>
@endif
@if(Session::has('addpreviously'))
<div class="alert alert-danger alert-dismissible" role="success">
    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</button>
    <b>{{Session::get('addpreviously')}}</b>
</div>
@endif
@if(Session::has('pronoaddtolist'))
<div class="alert alert-danger alert-dismissible" role="success">
    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</button>
    <b>{{Session::get('pronoaddtolist')}}</b>
</div>
@endif

@if(Session::has('productonocreado'))
<div class="alert alert-danger alert-dismissible" role="success">
    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</button>
    <b>{{Session::get('productonocreado')}}</b>
</div>
@endif
@if(Session::has('productosnovendidos'))
<div class="alert alert-danger alert-dismissible" role="success">
    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</button>
    <b>{{Session::get('productosnovendidos')}}</b>
</div>
@endif
@if(Session::has('insumonoactualizado'))
<div class="alert alert-danger alert-dismissible" role="success">
    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</button>
    <b>{{Session::get('insumonoactualizado')}}</b>
</div>
@endif
@if(Session::has('insnoaddtolist'))
<div class="alert alert-danger alert-dismissible" role="success">
    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</button>
    <b>{{Session::get('insnoaddtolist')}}</b>
</div>
@endif
@if(Session::has('productosnoagregados'))
<div class="alert alert-danger alert-dismissible" role="success">
    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</button>
    <b>{{Session::get('productosnoagregados')}}</b>
</div>
@endif
@if(Session::has('badcant'))
<div class="alert alert-danger alert-dismissible" role="success">
    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</button>
    <b>{{Session::get('badcant')}}</b>
</div>
@endif
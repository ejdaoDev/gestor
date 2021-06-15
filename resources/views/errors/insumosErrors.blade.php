@if(Session::has('insumonocreado'))
<div class="alert alert-danger alert-dismissible" role="success">
    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</button>
    <b>{{Session::get('insumonocreado')}}</b>
</div>
@endif
@if(Session::has('insumonoactualizado'))
<div class="alert alert-danger alert-dismissible" role="success">
    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</button>
    <b>{{Session::get('insumonoactualizado')}}</b>
</div>
@endif
@if(count($errors)>0)
<div class="alert alert-danger alert-dismissible" role="success">
    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</button>
    @foreach($errors->all() as $error)
    <b>{{$error}}</b>
    @endforeach
</div>
@endif
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
@if(Session::has('insnoaddtolist'))
<div class="alert alert-danger alert-dismissible" role="success">
    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</button>
    <b>{{Session::get('insnoaddtolist')}}</b>
</div>
@endif
@if(Session::has('insumosnoagregados'))
<div class="alert alert-danger alert-dismissible" role="success">
    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</button>
    <b>{{Session::get('insumosnoagregados')}}</b>
</div>
@endif
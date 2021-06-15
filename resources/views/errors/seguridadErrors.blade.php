@if(Session::has('usuarionocreado'))
 <div class="alert alert-danger alert-dismissible" role="success">
 <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</button>
   <b>{{Session::get('usuarionocreado')}}</b>
 </div>
@endif
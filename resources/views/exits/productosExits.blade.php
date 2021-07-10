@if(Session::has('deletenice'))
 <div class="alert alert-primary alert-dismissible" role="success">
 <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</button>
   <b>{{Session::get('deletenice')}}</b>
 </div>
@endif
@if(Session::has('deleteallnice'))
 <div class="alert alert-primary alert-dismissible" role="success">
 <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</button>
   <b>{{Session::get('deleteallnice')}}</b>
 </div>
@endif
@if(Session::has('productocreado'))
 <div class="alert alert-success alert-dismissible" role="success">
 <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</button>
   <b>{{Session::get('productocreado')}}</b>
 </div>
@endif
@if(Session::has('productosvendidos'))
 <div class="alert alert-success alert-dismissible" role="success">
 <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</button>
   <b>{{Session::get('productosvendidos')}}</b>
 </div>
@endif
@if(Session::has('insumoactualizado'))
 <div class="alert alert-success alert-dismissible" role="success">
 <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</button>
   <b>{{Session::get('insumoactualizado')}}</b>
 </div>
@endif
@if(Session::has('insaddtolist'))
 <div class="alert alert-success alert-dismissible" role="success">
 <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</button>
   <b>{{Session::get('insaddtolist')}}</b>
 </div>
@endif
@if(Session::has('productosagregados'))
 <div class="alert alert-success alert-dismissible" role="success">
 <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</button>
   <b>{{Session::get('productosagregados')}}</b>
 </div>
@endif
@if(Session::has('proaddtolist'))
 <div class="alert alert-success alert-dismissible" role="success">
 <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</button>
   <b>{{Session::get('proaddtolist')}}</b>
 </div>
@endif
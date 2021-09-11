@if(Session::has('usuariocreado'))
 <div class="alert alert-success alert-dismissible" role="success">
 <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</button>
   <b>{{Session::get('usuariocreado')}}</b>
 </div>
@endif
@if(Session::has('usuarioeditado'))
 <div class="alert alert-success alert-dismissible" role="success">
 <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</button>
   <b>{{Session::get('usuarioeditado')}}</b>
 </div>
@endif
@if(Session::has('usuarioactivado'))
 <div class="alert alert-success alert-dismissible" role="success">
 <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</button>
   <b>{{Session::get('usuarioactivado')}}</b>
 </div>
@endif
@if(Session::has('usuarioinactivado'))
 <div class="alert alert-danger alert-dismissible" role="success">
 <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</button>
   <b>{{Session::get('usuarioinactivado')}}</b>
 </div>
@endif
@if(Session::has('passrecuperada'))
 <div class="alert alert-success alert-dismissible" role="success">
 <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</button>
   <b>{{Session::get('passrecuperada')}}</b>
 </div>
@endif
@if(Session::has('passrestablecida'))
 <div class="alert alert-success alert-dismissible" role="success">
 <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</button>
   <b>{{Session::get('passrestablecida')}}</b>
 </div>
@endif
@if(Session::has('prscrea'))
 <div class="alert alert-success alert-dismissible" role="success">
 <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</button>
   <b>{{Session::get('prscrea')}}</b>
 </div>
@endif
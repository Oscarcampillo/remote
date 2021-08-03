
@extends('layouts.app')

@section('content')
<div class="container">


<h1>Editar empleado</h1>
<form action="{{url('/empleado/'.$empleado->id )}}" method="post">
@csrf 
@method('PUT')

@if(count($errors)>0)
<div class= 'alert alert-danger' role="alert">
    <ul>
        @foreach( $errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif 

<div class="container">
  <div class="row align-items-start">
    <div class="col">
<label for="nombre"> nombre</label>
<input type="text" class= "form-control" value="{{isset($empleado->nombre)?$empleado->nombre:''}}" name="nombre" id="nombre">
<br>
  </div>
<div class="form-group">
<label for="apellidopaterno"> apellidopaterno</label>
<input type="text" class= "form-control" value="{{isset($empleado->apellidopaterno)?$empleado->apellidopaterno:''}}" name="apellidopaterno" id="apellidopaterno">
<br>
</div>

<div class="form-group">
<label for="apellidomaterno"> apellidomaterno</label>
<input type="text" class= "form-control"value="{{isset($empleado->apellidomaterno)?$empleado->apellidomaterno:''}}" name="apellidomaterno" id="apellidomaterno">
<br>
</div>
<div class="form-group">
<label for="correo"> correo</label>
<input type="text"class= "form-control" value="{{isset($empleado->correo)?$empleado->correo:''}}"name="correo" id="correo">
<br>
</div>
<input type="submit" class="btn btn-primary" value="editar datos">
<br>
<a href="{{url('/empleado')}}" class="btn btn-success">regresar</a>

</form>
</div>
@endsection
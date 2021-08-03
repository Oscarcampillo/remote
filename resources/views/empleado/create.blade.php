@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h2>Nuevo empleado</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <form action="{{ url('/empleado') }}" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="nombre"> nombre</label>
                            <input type="text" name="nombre" id="nombre" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="apellidopaterno"> apellidopaterno</label>
                            <input type="text" name="apellidopaterno" id="apellidopaterno" class="form-control">
                        </div>
                        </div>    
                    <div class="col-lg-4">
                    <div class="form-group">
                     <label for="apellidomaterno"> apellidomaterno</label>
                        <input type="text" name="apellidomaterno" id="apellidomaterno" class="form-control"> 
                    </div>
                    </div>
                    <div class="col-lg-4">
                    <div class="form-group">
                 
                    <label for="correo"> correo</label>
                                <input type="text" name="correo" id="correo" class="form-control">
                </div>
        </div>
    </div>
</div>


                            
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <input type="submit" class="btn btn-dark" value="crear datos">
                        <a href="{{url('/empleado')}}" class="btn btn-success">regresar</a>
                    </div>
                </div>
            
            
        

        @csrf

        @if(count($errors)>0)
        <div class='alert alert-danger' role="alert">
            <ul>
                @foreach( $errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <div class="row justify-content-center">
            <div class="col-3">

                <br>
            </div>

            </form>

        </div>
    
</div>

@endsection
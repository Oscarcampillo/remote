
@extends('layouts.app')

@section('content')
<div class="container">


@if(Session::has('mensaje'))
<div class="alert alert-success alert-dismissible" role="alert">
{{Session::get('mensaje')}}
@endif
</span>
</button>

</div>
<a href="{{url('empleado/create')}}"class= "btn btn-success">registrar nuevo empleado</a>
</br>
</br>

<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>nombre</th>
            <th>apellidopaterno</th>
            <th>apellidomaterno</th>
            <th>correo</th>
            <th>acciones</th>
            <th></th>
        </tr>

    </thead>
    <tbody>
        @foreach( $empleados as $empleado)
        <tr>
            <td></td>
            <td>{{$empleado->id}}</td>
            <td>{{$empleado->nombre}}</td>
            <td>{{$empleado->apellidopaterno}}</td>
            <td>{{$empleado->apellidomaterno}}</td>
            <td>{{$empleado->correo}}</td>
            <td> |
                <a href="{{ url('/empleado/'.$empleado->id .'/edit')}}"class="btn btn-info text-white rounded ">Editar
                </a>
                <form action="{{url('/empleado/'.$empleado->id )}}"class='d-inline' method="POST">
                    @csrf
                    {{method_field('delete')}}
                    <input type="submit" onclick="return confirm ('quieres borrar')" class="btn btn-danger"value="borrar">

                </form>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{!!$empleados->links()!!}
</div>
@endsection 
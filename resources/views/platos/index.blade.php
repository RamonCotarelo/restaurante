
@extends('layouts.app')

@section('content')


<div class="container">
    <h1>Menú</h1>
    <br>
<a href="{{url('platos/create')}}" class="btn btn-success" >Añadir un plato</a><br><br>

<table class="table table-light">

    <thead class="thead-light">
        <th>#</th>
        <th>Nombre</th>
        <th>Categoría</th>
        <th>Foto</th>
        <th>Precio €</th>
        <th>Acciones</th>

    </thead>
   
    <tbody>
        @foreach ($platos as $plato)
            
        <tr>
            <td>{{ $plato->id }}</td>
            <td>{{ $plato->nombre }}</td>
            <td>{{ $plato->categoria }}</td>
            <td>
                <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$plato->foto }}" width="100" alt="">
                {{-- {{ $plato->foto }} --}}
            </td>
            <td>{{ $plato->precio }}</td>
            <td>
                
                <a href="{{ url('/platos/'.$plato->id.'/edit')  }}" class="btn btn-warning" >Editar</a>
                 | 
                <form action="{{ url('/platos/'.$plato->id) }}" class="d-inline" method="post">
                    @csrf
                    {{ method_field('DELETE') }}
                    <input class="btn btn-danger" type="submit" onclick="return confirm('¿Quieres eliminar el plato?')" value="Borrar">

                </form>


            </td>
        </tr>

        @endforeach
    </tbody>



</table>
</div>
@endsection
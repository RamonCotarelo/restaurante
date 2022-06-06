@extends('layouts.app')

@section('content')
<div class="container">

<form action="{{ url('/platos') }} " method="post" enctype="multipart/form-data">
    @csrf
    @include('platos.form',['modo'=>'Crear'])
    
    


</form>
</div>
@endsection
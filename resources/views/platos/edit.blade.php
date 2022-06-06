{{-- editar platos --}}
@extends('layouts.app')

@section('content')
<div class="container">
<form action="{{url('/platos/'.$platos->id)}}" method="post" enctype="multipart/form-data">
@csrf
{{ method_field('PATCH')}}
@include('platos.form',['modo'=>'Editar'])

</form>
</div>
@endsection
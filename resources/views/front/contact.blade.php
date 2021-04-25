@extends('layouts.app')
@section('content')
@if(isset($allcorrect))
  <div class='alert alert-succes'><p>{{$allcorrect}}</p></div>
@endif
<div class="container">
<form action = "{{route('send.contact')}}" method='POST'>
<input type="hidden" name="_token" value="{{ csrf_token() }}" />
<div class="form-group">
    <label for="exampleFormControlInput1">Nombre</label>
    <input type="text" name="nombre" class="form-control" id="exampleFormControlInput1">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Correo electronico</label>
    <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Example textarea</label>
    <textarea name='mensaje' class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>
  <input type="submit" value='Enviar'>
</form>


</div>

@endsection
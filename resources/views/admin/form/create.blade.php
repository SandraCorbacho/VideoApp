@extends('layouts.app')
@section('content')



<div class="container">

  <div class="row">

    <div class="col-lg-3">

      <h1 class="my-4">Canal Nombre Canal</h1>
      <h1>Este es tu perfil</h1>
      <h3>Aqui podrás:</h3>
      <p>subir Video</p>
      <p>Editar video</p>
      <p>Borrar video</p>
      <p>ver Estadisticas de tu canal</p>
      <p>Ver y gestionar subscripciones</p>

    </div>
   <form method="POST" action="{{route('create'.$item, $item)}}" enctype="multipart/form-data">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="col-lg-9">
      <h2>Nuevo {{$item}}</h2>
      <input type="hidden" name='type' value='{{$item}}' >
      <input type="hidden" name="_token" value="{{ csrf_token() }}" />
      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Nombre del {{$item}}</label>
        <input type="text" class="form-control" placeholder="Nombre para tu {{$item}}" name='title' @if(old("title")!==null) value="{{ old('title') }}" @endif >
      </div>
      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Descripción del {{$item}}</label>
        <textarea class="form-control" name='description' rows="3"></textarea>
      </div>
      <div class="input-group mb-3">
        <input type="file" name="image" >
        <label class="input-group-text"  for="inputGroupFile02">Imagen para tu {{$item}}</label>
      </div>
      @if($item == 'Video') 
      <div class="input-group mb-3">
        <input type="file"  accept="video/mp4" name="video" >
        <label class="input-group-text"  for="inputGroupFile02">Imagen para tu {{$item}}</label>
      </div>
      @endif
      @if($item == 'Video')
      <div class="input-group-text">
        <label class="input-group-text"  for="inputGroupFile02">Video activo</label>
        Sí <input type="radio" aria-label="Si" name='active' value='1'>
        No <input type="radio" aria-label="No" name='active' value='0'>
      </div>
      @endif
      <input type="submit" value=" crear {{$item}}">
    
    </div>
  </form>

  </div>
  <!-- /.row -->
</div>
@endsection
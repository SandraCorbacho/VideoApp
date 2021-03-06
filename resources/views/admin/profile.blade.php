@extends('layouts.app')
@section('content')

<!--<h1>Este es tu perfil</h1>
<h3>Aqui podrás:</h3>
<p>subir Video</p>
<p>Editar video</p>
<p>Borrar video</p>
<p>ver Estadisticas de tu canal</p>
<p>Ver y gestionar subscripciones</p>-->

<div class="container">

  <div class="row">

    <div class="col-lg-3">
  
      <h1 class="my-4">@if(isset($channel) && !empty($channel)) {{$channel->title}} @else Aún no has creado tu canal @endif</h1>
      @if(isset($channel) && !empty($channel))<img class='w-100' src="{{asset('storage/'.$channel->image)}}">@endif
      
      <div class="list-group">
        <a href="{{route('create','Video')}}" class="list-group-item">Nuevo Video</a>
        <a href="" class="list-group-item">Tus Videos</a>
        <a href="#" class="list-group-item">Tus Subscipciones</a>
        @if(!isset($channel) && empty($channel))<a href="{{route('create', 'Channel')}}" class="list-group-item">Crear canal</a>@else
        <a href="{{route('detail', 'Channel')}}" class="list-group-item">Tu canal</a> @endif
 
      </div>

    </div>
   
    <div class="col-lg-9">

      <div class="row">
      @foreach($videos as $video)
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="card h-100">
            <a href="{{route('editVideo', $video->id)}}"><img class="card-img-top" src="{{asset('storage/'.$video->image)}}" alt=""></a>
            <!--<video width="100%">
              <source src="{{asset('storage/'.$video->path)}}" type="video/mp4">
            </video>-->
            <div class="card-body">
              <h4 class="card-title">
                <a href="#">Item One</a>
              </h4>
              <h5>$24.99</h5>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!</p>
            </div>
            <div class="card-footer">
              <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
            </div>
          </div>
        </div>
      @endforeach
      <!-- /.row -->
      </div>
    </div>
    <!-- /.col-lg-9 -->

  </div>
  <!-- /.row -->
</div>
@endsection
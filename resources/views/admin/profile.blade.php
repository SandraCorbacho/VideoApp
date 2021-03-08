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
        <a href="{{route('profile')}}" class="list-group-item">Tus Videos</a>
        <a href="#" class="list-group-item">Tus Subscipciones</a>
        @if(!isset($channel) && empty($channel))<a href="{{route('create', 'Channel')}}" class="list-group-item">Crear canal</a>@else
        <a href="{{route('detail', 'Channel')}}" class="list-group-item">Tu canal</a> @endif
        @if((\Auth::User()->authorizeRoles(['admin'])))<a class="list-group-item" href='{{route("showUsers")}}'>Administrar usuarios</a> @endif
        <a href='{{asset("/")}}' class='btn btn-dark'>Volver</a>
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
              <a href="{{route('editVideo', $video->id)}}">{{$video->title}}</a>
              </h4>
              <p class="card-text">{{$video->description}}</p>
            </div>
            <div class="card-footer d-flex justify-content-between">
              <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small> <button class='borrar' value='{{$video->id}}' class='btn-danger'>Borrar</button>
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
@section('scripts')
<script>
    $('document').ready(function(){
      $('.borrar').click(function(){
        let id = $(this).attr('value');
        $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            type: 'post',
            url: "{{route('deleteVideo')}}",
            method:'POST',
            data: {
              id: id,
            },
          success: function(result){
              location.reload();
          }});
      })
    })
</script>
@endsection
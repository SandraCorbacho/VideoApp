@extends('layouts.app')
@section('content')

<div class="container">
  <div class="row">
    <div class="col-lg-3">
      <h1 class="my-4">@if(!empty($channel)) {{$channel->title}} @else Aún no has creado tu canal @endif</h1>
      @if($item != "Channel" && isset($channel))<img class='w-100' src="{{asset('storage/'.$channel->image)}}">@endif
      <div class="list-group">
        <a href="{{route('create','Video')}}" class="list-group-item">Nuevo Video</a>
        <a href="" class="list-group-item">Tus Videos</a>
        <a href="#" class="list-group-item">Tus Subscipciones</a>
        @if($item == 'Channel')
          <a href="{{route('edit'.$item, $item)}}" class="list-group-item">Editar canal</a>
        @endif
      </div>
    </div>
    <div class="col-9">
        <div class="row">
          <div class="col-12">
            <img class='w-100' src="{{asset('storage/'.$channel->image)}}" alt="">
          </div>
        </div>
    </div>
  </div>
  
</div>
@endsection
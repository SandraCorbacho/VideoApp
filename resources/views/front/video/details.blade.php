@extends('layouts.app')
@section('content')

<div class="container">

  <div class="row">
    <div class="col-lg-12">
      <div class="row justify-content-center">
        <div class="col-12">
        <video width="100%" style='max-height:450px' controls autoplay>
          <source src="{{asset('storage/'.$video->path)}}" type="video/mp4">
        </video>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container">
  <div class="row m-0 mt-5 p-0">
      <div class="col-6">
        <h2>
          <img class='mr-5' style='max-width:70px;clip-path: circle(50%);' src="{{asset('storage/'.$channel->image)}}" alt="">
          {{$video->title}}
        </h2>
      </div>
  </div>
</div>
<div class="row m-0 p-0">
    <div class="col-6 pl-5">
      <p>{{$video->description}}</p>
    </div>
</div>
@endsection
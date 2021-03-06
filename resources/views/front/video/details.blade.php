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
  <div class="col-12">
    <div class="row m-0 mt-5 p-0">
        <div class="col-9">
          <h2>
            <img class='mr-5' style='max-width:70px;clip-path: circle(50%);' src="{{asset('storage/'.$channel->image)}}" alt="">
            {{$video->title}}
          </h2>
        </div>
        <div class="col-3">
          <h2>Quizas te interese:</h2>
        </div>
       
    </div>
    <div class="row m-0 p-0">
        <div class="col-9 pl-5">
          <div class="row">
            <div class="col-12">
              <p>{{$video->description}}</p>
            </div>
            <div class="col-12">
              <h2>Comentarios</h2>
            </div>
          </div>
        </div>
        <div class="col-3">
          
            <div class="row">
                @foreach($otherVideos as $otherVideo)
                  @if($otherVideo->id != $video->id )
                    <a href="{{route('videoDetail', $otherVideo->id)}}" >
                      <div class="col-12 mb-5">
                          <div class="row">
                              <div class="col-6">
                                <img class='w-100' src="{{asset('storage/'.$otherVideo->image)}}" alt="">
                              </div>
                              <div class="col-6">
                                <p><b>{{$otherVideo->title}}</b></p>
                                <p>{{$otherVideo->description}}</p>
                              </div>
                          </div>       
                      </div>
                    </a>
                    @endif
                @endforeach
            </div>
             
          </div>
    </div>
   
  </div>
  
</div>

@endsection
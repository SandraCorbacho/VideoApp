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
        <div class="col-12">
        <div class="row">
            <div class='col-6'>Votos: <h3 id='votes'>{{$video->votes}}</h3></div> 
            <div class="col-6 text-right"> <button class='btn btn-dark' id='votar'>Votar</button></div>
        </div>
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
              @if(Auth::User())
                <form action="{{route('add.comment', $video->id)}}" method='POST'>
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                  <input type="text" name='comment' placeholder='Añadir comentario...'>
                  <input type="submit">
                </form>
              @endif
            
              <br>
              @if(isset($comments))
                @foreach($comments as $comment)
                  @if($comment->title != null)
                    <p>{{$comment->user->name}} dice:</p>
                    <p>{{$comment->title->title}}</p>
                    <hr>
                  @endif
                @endforeach
              @endif
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

@section('scripts')
  <script>
    $('document').ready(function(){
      $('#votar').click(function(){
        $.ajax({
          url: "{{route('vote' , $video->id)}}", 
          success: function(result){
              $('#votes').text(result)
          }});
      })
    })
  </script>
@endsection
@extends('layouts.app')
@section('content')

<div class="container">

  <div class="row">

    <div class="col-lg-3">
      <h1 class="my-4">Última Subida</h1>
      <div class="list-group">
        <a href="#" class="">
        <div class="col-lg-12 ">
        @if(!empty($videos))
          <div class="card h-100">
            <a href="#"><img class="card-img-top" src="{{asset('storage/'.$videos[0]->image)}}" alt=""></a>
            <div class="card-body">
              <h4 class="card-title">
                <a href="#">{{$videos[0]->title}}</a>
              </h4>
            </div>
          <!--  <div class="card-footer">
              <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
            </div>-->
          </div>
          @endif
        </div>


        </a>
       
      </div>

    </div>
    <!-- /.col-lg-3 -->

    <div class="col-lg-9">

      <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
        <ol class="carousel-indicators">
        @foreach($videos as $key=>$video)
       
          <li data-target="#carouselExampleIndicators" data-slide-to="0" @if($key == 0) class="active" @endif></li>
        @endforeach
        </ol>
        <div class="carousel-inner" role="listbox">
        @foreach($videos as $clave => $video)
          <div class="carousel-item @if($clave==0)active @endif" style="background-image: url('{{asset('storage/'.$video->image)}}');height: 310px;
    background-size: cover;
    background-position: center;">
          </div>
        @endforeach
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>

      <div class="row">
      @foreach($videos as $video)  
        <div class="col-lg-4 col-md-6 mb-4">
        <a href="{{route('videoDetail', $video->id)}}">
          <div class="card h-100">
           <img class="card-img-top" src="{{asset('storage/'.$video->image)}}" alt=""></a>
            <div class="card-body">
              <h4 class="card-title">
                {{$video->title}}
              </h4>
              <p class="card-text">{{$video->description}}</p>
            </div>
            <div class="card-footer">
              <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
            </div>
          </div>
        </div>
        </a>
      @endforeach


        

        

     

      

      </div>
      <!-- /.row -->

    </div>
    <!-- /.col-lg-9 -->

  </div>
  <!-- /.row -->

</div>

@endsection
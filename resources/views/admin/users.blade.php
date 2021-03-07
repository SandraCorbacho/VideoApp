@extends('layouts.app')
@section('content')

<div class="container">
  <div class="row">
    <div class="col-lg-3">
      <h1 class="my-4">@if(!empty($channel)) {{$channel->title}} @else Aún no has creado tu canal @endif</h1>
      @if(isset($item) && $item != "Channel" && isset($channel))<img class='w-100' src="{{asset('storage/'.$channel->image)}}">@endif
      <div class="list-group">
        <a href="{{route('create','Video')}}" class="list-group-item">Nuevo Video</a>
        <a href="" class="list-group-item">Tus Videos</a>
        <a href="#" class="list-group-item">Tus Subscipciones</a>
        @if(isset($item) &&  $item == 'Channel')
          <a href="{{route('edit'.$item, $item)}}" class="list-group-item">Editar canal</a>
        @endif
      </div>
    </div>
    
    <div class="col-9">
        <div class="row">
          <div class="col-12">
            <table class='table'>
                <thead class='thead-dark'>
                    <tr>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Canal</th>
                        <th>nº Videos</th>
                        <th>Max Rol</th>
                        <th>Petición pendiente</th>

                    </tr>
                </thead>
                
                @foreach($users as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>@if($user->channel == null)Sin Canal @else {{$user->channel->title}} @endif</td>
                    <td>falta relacion videos</td>
                    @foreach($user->roles as $role)
                        <td>{{$role->name}}</td>
                        @break;
                    @endforeach
                    <?php $hasPetition = false;?>
                    @if(count($user->roleUp) != 0)
                        @foreach($user->roleUp as $petition)
                            @if($petition->atendida == 0)
                              <input type="hidden" id='_token{{$user->id}}' name="_token" value="{{ csrf_token() }}" />
                              <td id = '{{$user->id}}'>Sí <button id='acceptRole' class='ml-3'>Subir</button><button id='denyRole'class='ml-3'>Rechazar</button></td>
                              <?php $hasPetition = true; ?>
                              @break;
                            @endif
                           
                        @endforeach
                    @elseif($hasPetition == false)
                      ç<td>No</td>
                    @endif
                  
                   
                </tr>
                
                @endforeach
            
            </table>
          </div>
        </div>
    </div>
  </div>
  
</div>
@endsection


@section('scripts')
  <script>
    $('document').ready(function(){
       $('#acceptRole').click(function(){
          let item = $(this).parent()[0];
          let id= $(item).attr('id')
          //console.log(id)
         
          $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            type: 'post',
            dataType: 'json',
            url: "{{route('roleUp')}}",
            method:'POST',
          
            data: {
              id: id,
            },
           
              
          success: function(result){
            $('#'+id).hiden();
          }});
       })
    })
  </script>

@endsection
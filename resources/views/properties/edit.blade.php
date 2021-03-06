@extends('layouts.app')

@section('content')
    <div class="col-lg-12">

        <h1 class="my-4">Property edit</h1>
        <form action="{{route('properties.update',$property->id)}}" method="POST">
            @csrf
            @method('PUT')
            Description
            <br/>
            <input type="text" name="description" value="{{$property->description}}" class="form form-control">

            Price
            <br/>
            <input type="text" name="price" value="{{$property->price}}" class="form form-control">
            Owner
            <br/>
            <input class="list-group " list="owner_id" name="owner_id" value="{{$property->owner_id}}">
            @foreach($users as $user)
                <datalist id="owner_id">
                    <option value="{{$user->id}}">{{$user->email}}</option>
                </datalist>
            @endforeach
            <br/>
            <input type="submit" class="btn btn-primary" value="Save">
            <br/>
            <br/>
        </form>
    <br/>
    </div>

    @endsection
@extends('layouts.app')

@section('content')
    <div class="col-lg-12">

        <h1 class="my-4">Properties</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Type</th>
                    <th></th>
                </tr>
            @foreach($properties as $property)
                <tr>
                    <td>{{$property->description}}</td>
                    <td>{{$property->price}} €</td>
                    <td>{{$property->type}}</td>
                    <td><a class="btn btn-primary" href="{{route('properties.edit',$property->id)}}">Edit</a></td>
                </tr>
            @endforeach

            </thead>
        </table>
    </div>

    @endsection
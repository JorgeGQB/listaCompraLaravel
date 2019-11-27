@extends('layouts.master')

@section('content')

<div class="row">

    <div class="col-sm-4">

        <img src="https://picsum.photos/200/300/?random" style="height:200px"/>

    </div>
    <div class="col-sm-8">

        <h2>{{$producto->nombre}}</h2>
        <p><b>Categoría:</b> {{$producto->categoria}}</p>
        <p><b>Estado: </b>Producto actualmente comprado</p>
        <br>
        <button type="button" class="btn btn-danger">Pendiente de compra</button>
        <a class="btn btn-warning" href="{{action('ProductoController@getEdit', $producto->id)}}">Editar producto</a>
        <a class="btn btn-outline-info" href="{{action('ProductoController@getIndex')}}">Volver al índice</a>
    </div>
</div>


@stop

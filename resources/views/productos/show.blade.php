@extends('layouts.app')

@section('content')

<div class="row">

    <div class="col-sm-4">

        <img src="https://picsum.photos/200/300/?random" style="height:200px"/>

    </div>
    <div class="col-sm-8">

        <h2>{{$producto->nombre}}</h2>
        <p><b>Categoría:</b> {{$producto->categoria}}</p>
        <p><b>Estado: </b>
            @if($producto->pendiente)
                Producto actualmente fuera de stock
            @else
                Producto en stock para comprar
            @endif
        </p>
        <br>
        <form action="{{ action('ProductoController@putComprar', ['id' => $producto->id]) }}" method="POST">
        {{method_field('PUT')}}
        @csrf
        <input type="hidden" name="id" value="{{ $producto->id }}">
        @if($producto->pendiente)
        <button type="sumbit" class="btn btn-danger">Pendiente de reposición</button>
        @else
        <button type="sumbit" class="btn btn-primary">Comprar</button>
        @endif
        <a class="btn btn-warning" href="{{action('ProductoController@getEdit', $producto->id)}}">Editar producto</a>
        <a class="btn btn-outline-info" href="{{action('ProductoController@getIndex')}}">Volver al índice</a>
    </div>
</div>


@stop

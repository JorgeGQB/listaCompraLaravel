@extends('layouts.master')

@section('content')

<div class="row">

    <div class="col-sm-4">

        <img src="https://picsum.photos/200/300/?random" style="height:200px"/>

    </div>
    <div class="col-sm-8">

        <h2>{{$id[0]}}</h2>
        <p><b>Categoría:</b> {{$id[1]}}</p>
        <p><b>Estado: </b>Producto actualmente comprado</p>
        <br>
        <button type="button" class="btn btn-danger">Pendiente de compra</button>
        <button class="btn btn-warning">Editar producto</button>
        <button class="btn btn-default">Volver al índice</button>

    </div>
</div>


@stop

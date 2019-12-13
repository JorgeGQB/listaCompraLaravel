@extends('layouts.app')

@section('content')

<div class="row">

    <div class="col-sm-4">

        <img src="{{asset('storage/' . $producto->imagen)}}" style="height:200px"/>

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
        <form action="{{ action('ProductoController2@putComprar', array('producto' => $producto)) }}" method="POST">
            {{method_field('PUT')}}
            @csrf
            <input type="hidden" name="id" value="{{ $producto->id }}">
            @if($producto->pendiente)
            <button type="sumbit" class="btn btn-danger">Pendiente de reposición</button>
            @else
            <button type="sumbit" class="btn btn-primary">Comprar</button>
            @endif
        </form>

        <a class="btn btn-warning" href="{{action('ProductoController2@edit', array('producto' => $producto))}}">Editar producto</a>
        <a class="btn btn-outline-info" href="{{action('ProductoController2@index')}}">Volver al índice</a>

        <form action="{{action('ProductoController2@destroy', array('producto' => $producto))}}">
            {{method_field('DELETE')}}
            @csrf
            <button onclick="return confirm('¿Seguro que desea borrar el producto?')" type="sumbit" class="btn btn-danger">Borrar producto</button>
        </form>
    </div>
</div>


@stop

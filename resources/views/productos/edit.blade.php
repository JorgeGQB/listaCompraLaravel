@extends('layouts.master')

@section('content')

<div class="row" style="margin-top:40px">
    <div class="offset-md-3 col-md-6">
        <div class="card">
            <div class="card-header text-center">
            Añadir producto
            </div>
        <div class="card-body" style="padding:30px">

            <form action="#" method="POST">
                {{method_field('PUT')}}
            @csrf

            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" name="name" id="name" class="form-control" value="{{$id[0]}}">
            </div>

            <div class="form-group">
                <label for="price">Precio</label>
                <input type="number" name="price" id="price" class="form-control">
            </div>

            <div class="form-group">
                <label for="category">Categoría</label>
                <input type="text" name="category" id="category" class="form-control" value="{{$id[1]}}">
            </div>

            <div class="form-group">
                <label for="image">Imagen</label>
                <input type="text" name="image" id="image" class="form-control">
            </div>

            <div class="form-group">
                <label for="description">Descripción</label>
                <input type="textarea" name="description" id="description" class="form-control">
            </div>

            <div class="form-group text-center">
                <button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
                    Añadir producto
                </button>
            </div>

            </form>

        </div>
    </div>
    </div>
</div>

@stop

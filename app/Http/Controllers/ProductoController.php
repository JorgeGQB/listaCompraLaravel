<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;

class ProductoController extends Controller
{
    public function getIndex(){
        $productos = Producto::all();
        return view('productos.index', array('productos'=>$productos));
    }

    public function getShow($id){
        $producto = Producto::findOrFail($id);
        return view('productos.show', array(
            'producto'=>$producto,
            'id'=>$id
        ));
    }

    public function getCreate(){
    return view('productos.create');
    }

    public function getEdit($id){
        $producto = Producto::findOrFail($id);
        return view('productos.edit', array(
            'producto'=>$producto,
            'id'=>$id
        ));
    }
}

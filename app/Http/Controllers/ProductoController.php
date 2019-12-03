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

    public function postCreate(Request $request) {
        $producto = new Producto();
        $producto->nombre = $request->name;
        $producto->precio = $request->price;
        $producto->categoria = $request->category;
        $producto->imagen = $request->image;
        $producto->descripcion = $request->description;
        $producto->save();
        return redirect(action('ProductoController@getIndex'));
    }

    public function getEdit($id){
        $producto = Producto::findOrFail($id);
        return view('productos.edit', array(
            'producto'=>$producto,
            'id'=>$id
        ));
    }

    public function putEdit(Request $request) {
        $producto = Producto::findOrFail($request->id);
        $producto->nombre = $request->name;
        $producto->precio = $request->price;
        $producto->categoria = $request->category;
        $producto->imagen = $request->image;
        $producto->descripcion = $request->description;
        $producto->save();
        return redirect()->action('ProductoController@getShow', [$request->id]);
    }
}

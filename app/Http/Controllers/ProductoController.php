<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{
    public function getIndex($categoria = null){
        if (isset($categoria)) {
            if ($categoria == 'categorias') {
                $productos = Producto::select('categoria')->distinct('categoria')->get();
                $devuelve = view('productos.categorias', array('productos' => $productos));
            } else {
                $productos = Producto::where('categoria', $categoria)->get();
                $devuelve = view('productos.index', array('productos'=>$productos));
            }
        } else {
            $productos = Producto::all();
            $devuelve = view('productos.index', array('productos'=>$productos));
        }
        return $devuelve;
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
        if($request->exists('image')) {
            $producto->imagen = Storage::disk('public')->putFile('images', $request->file('image'));
        }
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
        if($request->exists('image')) {
            $producto->imagen = Storage::disk('public')->putFile('images', $request->file('image'));
        }
        $producto->descripcion = $request->description;
        $producto->save();
        return redirect()->action('ProductoController@getShow', [$request->id]);
    }

    public function putComprar(Request $request, $id) {
        $producto = Producto::findOrFail($request->id);
        $producto->pendiente = !$producto->pendiente;
        $producto->save();

        return redirect()->action('ProductoController@getShow', ['id' => $id]);
    }
}

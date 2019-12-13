<?php

namespace App\Http\Controllers;

use App\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductoController2 extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('productos.index', array('productos'=>Producto::all()));
    }

    public function categorias($categoria = null) {
        if (isset($categoria)) {
            $productos = Producto::where('categoria', $categoria)->get();
            $devuelve = view('productos.index', array('productos'=>$productos));
        } else {
            $productos = Producto::select('categoria')->distinct('categoria')->get();
            $devuelve = view('productos.categorias', array('productos' => $productos));
        }
        return $devuelve;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('productos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $producto = new Producto();
        $producto->nombre = $request->name;
        $producto->precio = $request->price;
        $producto->categoria = $request->category;
        if($request->exists('image')) {
            $producto->imagen = Storage::disk('public')->putFile('images', $request->file('image'));
        }
        $producto->descripcion = $request->description;
        $producto->save();
        return redirect(action('ProductoController2@index'))->with('success', 'Producto creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  Producto $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        return view('productos.show', array('producto'=>$producto));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Producto $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        return view('productos.edit', array('producto'=>$producto));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Producto $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        $producto->nombre = $request->name;
        $producto->precio = $request->price;
        $producto->categoria = $request->category;
        if($request->exists('image')) {
            $producto->imagen = Storage::disk('public')->putFile('images', $request->file('image'));
        }
        $producto->descripcion = $request->description;
        $producto->save();
        return redirect(action('ProductoController2@show', array('producto'=>$producto)))->with('success', 'Producto editado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        $producto->delete();
        return redirect(action('ProductoController2@index'))->with('success', 'Producto eliminado correctamente');
    }

    public function putComprar(Request $request, Producto $producto)
    {
        $producto->pendiente = !$producto->pendiente;
        $producto->save();
        return redirect()->action('ProductoController2@show', array('producto'=>$producto));
    }
}

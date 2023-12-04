<?php

namespace App\Http\Controllers;

use App\Http\Requests\BuscarRequest;
use App\Http\Requests\productoRequest;
use App\Models\Categoria;
use App\Models\Producto;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session; // Agrega esta línea

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $total=0;
    public function index(Request $request)
    {
        $categoria=Categoria::all();
        $producto=DB::table("categorias")
        ->join('productos', 'categorias.id', '=', 'productos.categoria_id')

        ->where('productos.estado', 1)

        ->where('categorias.nombre', 'LIKE','%'.$request->buscar.'%')
        ->select('productos.id','productos.nombre','productos.fechaVencimiento','productos.precio', 'productos.stock','categorias.nombre as categoria')
        ->get();
           return view("productos.index",compact("categoria"),compact("producto"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(productoRequest $request)
    {
        Producto::create($request->all());
        return back();


    }

    /**
     * Display the specified resource.
     */
    public function venta(Producto $producto)

    {
        $mensaje='';
        return view("productos.venta", compact("producto"),compact("mensaje"));
    }
    public function realizarVenta(Request $request, Producto $producto)
    {
        $request->validate([
            'cantidad' => 'required|numeric|min:1',
        ]);

        // Variable para almacenar el mensaje
        $mensaje = '';
        // Verificar si hay suficiente stock
        if ($producto->stock >= $request->cantidad) {
            // Actualizar el stock
            $producto->stock -= $request->cantidad;
            $producto->save();
            // Configurar el mensaje de éxito
            $mensaje = 'Venta realizada con éxito.';
        } else {
            $mensaje="no hay suficientes productos en stock";
            // Configurar el mensaje de alerta si no hay suficiente stock

        }

        // Pasar el mensaje como variable a la vista
        return view('productos.venta', compact('producto', 'mensaje'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Producto $producto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Producto $producto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $producto)
    {
        $producto->estado=false;
        $producto->save();
        return back();
    }
    public function VentasPorFecha(Request $request)
{
    $fecha = Carbon::parse($request->fecha);

    // Utilizando Query Builder para obtener el total en dólares de las ventas por fecha
    $totalVentasDolares = DB::table('productos')
        ->join('categorias', 'productos.categoria_id', '=', 'categorias.id')
        ->where('productos.estado', 1)
        ->where('categorias.nombre', 'LIKE', '%' . $request->buscar . '%')
        ->where('productos.fechaVencimiento', $fecha->format('Y-m-d')) // Asegúrate de ajustar el formato según tu base de datos
        ->sum(DB::raw('productos.stock * productos.precio'));

    return view('productos.totalventas', compact('totalVentasDolares', 'fecha'));
}
}



@extends('layouts.landing')
@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Registro de Libro</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form method="POST" action="{{route('productos.realizarVenta',$producto->id)}}">
        @csrf
      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Cantidad que requiere</label>
          <input type="number" name="cantidad" class="form-control" id="exampleInputEmail1" >
        </div>

      </div>

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Registrar</button>
      </div>
    </form>
</div>


<h1>{{$mensaje}}</h1>

    <div class="container">



    <!-- Resto del contenido de la vista de productos -->
</div>
@endsection

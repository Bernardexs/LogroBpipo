@extends('layouts.landing')
@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Registro de Libro</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form method="POST" action="{{route('producto.store')}}">
        @csrf
      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Nombre de producto</label>
          <input type="text" name="nombre" class="form-control" id="exampleInputEmail1" >
        </div>
        @error('nombre')
<p>{{$message}}</p>
        @enderror
        <div class="form-group">
            <label for="exampleInputEmail3">fecha de vencimiento</label>
            <input type="text" name="fechaVencimiento" class="form-control" id="exampleInputEmail3" >
          </div>
          @error('fechaVencimiento')
          <p>{{$message}}</p>
                  @enderror
          <div class="form-group">
            <label for="exampleInputEmail3">precio</label>
            <input type="number" name="precio" class="form-control" id="exampleInputEmail3" >
          </div>
          @error('precio')
          <p>{{$message}}</p>
                  @enderror
          <div class="form-group">
            <label for="exampleInputEmail3">cantidad en stock</label>
            <input type="number" name="stock" class="form-control" id="exampleInputEmail3" >
          </div>
          @error('stock')
          <p>{{$message}}</p>
                  @enderror
        <label for="inputStatus">Categoria</label>
        <select name="categoria_id" id="inputStatus" class="form-control custom-select">
            @foreach ($categoria as $item )



            <option value="{{$item->id}}">{{$item->nombre}}</option>
            @endforeach

          </select>

      </div>

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Registrar</button>
      </div>
    </form>
</div>
@endsection

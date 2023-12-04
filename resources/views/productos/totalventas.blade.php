@extends('layouts.landing')
@section( 'content')
<h1>Total de Ventas en Dólares por Fecha</h1>
<p>Fecha: {{ $fecha->format('Y-m-d') }}</p>
<p>Total de Ventas en Dólares: ${{ number_format($totalVentasDolares, 2) }}</p>
@endsection

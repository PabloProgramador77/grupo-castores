@extends('home')
@section('contenido')
    <div class="container-fluid overflow-auto">
        <div class="container-fluid row rounded mb-2">
            <div class="col-lg-5">
                <h4 class="fw-semibold mt-3"><i class="fas fa-tags"></i> Productos</h4>
                <small class="fw-semibold p-1 m-0 text-secondary">Elige el producto a gestionar o agrega uno nuevo con el botón <b class="text-primary border rounded bg-success p-1"><i class="fas fa-plus"></i></b></small>
            </div>
            <div class="col-lg-6 p-1">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-chevron p-3 bg-body-tertiary">
                        <li class="breadcrumb-item">
                            <a class="link-body-emphasis" href="/home">
                                Inicio
                                <i class="fas fa-home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item active">
                            Productos
                            <i class="fas fa-tags"></i>
                        </li>
                    </ol>
                </nav>
            </div>
            <div class="col-lg-1">
                @can('agregar-producto')
                <button class="btn btn-success mt-3 shadow" data-toggle="modal" data-target="#nuevoProducto"><i class="fas fa-plus" ></i></button>
                @endcan
            </div>
        </div>
        <div class="container-fluid row rounded bg-white mt-1 p-2">
            <div class="col-lg-12 col-md-6 col-sm-6">
                @php
                    $heads = ['Producto', 'Precio', 'Estatus', 'Existencia', 'Opciones'];
                @endphp
                <x-adminlte-datatable id="contenedorproductos" theme="light" head-theme="dark" :heads="$heads" compressed striped hoverable beautify>
                    @if( count( $productos) > 0 )
                        @foreach( $productos as $producto )
                            <tr>
                                <td>{{ $producto->nombre }}</td>
                                <td>$ {{ number_format( $producto->precio, 1 ) }}</td>
                                <td>{!! $producto->estatus == 1 ? '<span class="bg-success p-1 rounded">Activo</span>' : '<span class="bg-warning p-1 rounded">Inactivo</span>' !!}</td>
                                <td>{{ $producto->stock }}</td>
                                <td>
                                
                                    @if( $producto->estatus == 1 )
                                        <button class="btn shadow border border-primary editar" data-value="{{ $producto->id }}, {{ $producto->nombre }}, {{ $producto->precio }}" data-toggle="modal" data-target="#editarProducto" title="Editar producto"><i class="fas fa-edit"></i></button>
                                        @can('borrar-producto')
                                        <button class="btn shadow border border-danger borrar" data-value="{{ $producto->id }}, {{ $producto->nombre }}"><i class="fas fa-trash" title="Eliminar producto"></i></button>
                                        @endcan
                                        @can('aumentar-inventario')
                                        <button class="btn shadow border border-info comprar" data-value="{{ $producto->id }}, {{ $producto->nombre }}, {{ $producto->precio }}" title="Comprar producto" data-toggle="modal" data-target="#modalComprar"><i class="fas fa-shopping-cart"></i></button>
                                        @endcan
                                        @can('sacar-inventario')
                                        <button class="btn shadow border border-warning vender" data-value="{{ $producto->id }}, {{ $producto->nombre }}, {{ $producto->precio }}" title="Vender producto" data-toggle="modal" data-target="#modalVender"><i class="fas fa-truck"></i></button>
                                        @endcan
                                    @endif
                                    
                                    @if( $producto->estatus == 0 )
                                        @can('reactivar-producto')
                                        <button class="btn shadow border border-success activar" data-value="{{ $producto->id }}" title="Activar producto"><i class="fas fa-redo"></i></button>
                                        @endcan
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5" class="text-info fw-bold text-center">No hay productos registrados <i class="fas fa-exclamation-circle"></i></td>
                        </tr>
                    @endif
                </x-adminlte-datatable>
            </div>
        </div>
    </div>

    @include('productos.nuevo')
    @include('productos.editar')
    @include('productos.comprar')
    @include('productos.vender')

    <script src="{{ asset('js/jquery-3.7.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/sweetAlert.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/js/productos/create.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/js/productos/read.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/js/productos/update.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/js/productos/delete.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/productos/active.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/productos/comprar.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/productos/vender.js') }}" type="text/javascript"></script>
@stop
@extends('home')
@section('contenido')
    <div class="container-fluid overflow-auto">
        <div class="container-fluid row rounded mb-2">
            <div class="col-lg-5">
                <h4 class="fw-semibold mt-3"><i class="fas fa-tags"></i> Compras</h4>
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
                            Compras
                            <i class="fas fa-shopping-cart"></i>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="container-fluid row rounded bg-white mt-1 p-2">
            <div class="col-lg-12 col-md-6 col-sm-6">
                @php
                    $heads = ['Producto', 'Precio', 'Cantidad', 'Usuario', 'Fecha'];
                @endphp
                <x-adminlte-datatable id="contenedorcompras" theme="light" head-theme="dark" :heads="$heads" compressed striped hoverable beautify>
                    @if( count( $compras) > 0 )
                        @foreach( $compras as $compra )
                            <tr>
                                <td>{{ $compra->producto->nombre }}</td>
                                <td>$ {{ number_format( $compra->producto->precio, 1 ) }}</td>
                                <td>{{ $compra->cantidad }}</td>
                                <td>{{ $compra->usuario->name }}</td>
                                <td>{{ $compra->created_at }}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5" class="text-info fw-bold text-center">No hay compras registrados <i class="fas fa-exclamation-circle"></i></td>
                        </tr>
                    @endif
                </x-adminlte-datatable>
            </div>
        </div>
    </div>

@stop
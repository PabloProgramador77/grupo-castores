@extends('home')
@section('contenido')
    <div class="container-fluid overflow-auto">
        <div class="container-fluid row rounded mb-2">
            <div class="col-lg-5">
                <h4 class="fw-semibold mt-3"><i class="fas fa-truck"></i> Ventas</h4>
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
                            Ventas
                            <i class="fas fa-truck"></i>
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
                <x-adminlte-datatable id="contenedorventas" theme="light" head-theme="dark" :heads="$heads" compressed striped hoverable beautify>
                    @if( count( $ventas) > 0 )
                        @foreach( $ventas as $venta )
                            <tr>
                                <td>{{ $venta->producto->nombre }}</td>
                                <td>$ {{ number_format( $venta->producto->precio, 1 ) }}</td>
                                <td>{{ $venta->cantidad }}</td>
                                <td>{{ $venta->usuario->name }}</td>
                                <td>{{ $venta->created_at }}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5" class="text-info fw-bold text-center">No hay ventas registrados <i class="fas fa-exclamation-circle"></i></td>
                        </tr>
                    @endif
                </x-adminlte-datatable>
            </div>
        </div>
    </div>

@stop
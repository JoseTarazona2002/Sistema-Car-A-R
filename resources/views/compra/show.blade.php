@extends('layouts.app')

@section('title','Ver compra')

@push('css')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<style>
    @media (max-width:575px) {
        #hide-group {
            display: none;
        }
    }

    @media (min-width:576px) {
        #icon-form {
            display: none;
        }
    }
</style>
@endpush

@section('content')
<div class="container-fluid">

    <ul class="pagination pt-3 pb-5">
        <li class="page-item"><a class="page-link" href="{{ route('panel') }}">Inicio</a></li>
        <li class="page-item"><a class="page-link" href="{{ route('compras.index') }}">Compras</a></li>
        <li class="page-item active" aria-current="page">
        <span class="page-link">Ver Compra</span>
        </li>
    </ul>
</div>

<div class="container-fluid">
    <h1 class="fst-italic">Datos generales de la compra</h1>
    <div class="row">

    <div class="card col-6">
        <div class="card-body">

            <!---Tipo comprobante--->
            <div class="row mb-1">
                <div class="col-sm-10">
                    <div class="input-group" id="hide-group">
                        <input disabled class="bg-success p-2 text-dark bg-opacity-50" type="text" class="form-control" value="Tipo de comprobante: ">
                        <input disabled  type="text" class="form-control" value="{{$compra->comprobante->tipo_comprobante}}">
                    </div>
                </div>
            </div>

            <!---Numero comprobante--->
            <div class="row mb-1">
                <div class="col-sm-10">
                    <div class="input-group" id="hide-group">
                        <input disabled class="bg-success p-2 text-dark bg-opacity-50" type="text" class="form-control" value="Número de comprobante: ">
                        <input disabled type="text" class="form-control" value="{{$compra->numero_comprobante}}">
                    </div>
                    
                </div>
            </div>

            <!---Proveedor--->
            <div class="row mb-1">
                <div class="col-sm-10">
                    <div class="input-group" id="hide-group">
                        <input disabled class="bg-success p-2 text-dark bg-opacity-50" type="text" class="form-control" value="Proveedor: ">
                        <input disabled type="text" class="form-control" value="{{$compra->proveedore->persona->razon_social}}">
                    </div>
                </div>
            </div>

            <!---Fecha--->
            <div class="row mb-1">
                <div class="col-sm-10">
                    <div class="input-group" id="hide-group">
                        <input disabled class="bg-success p-2 text-dark bg-opacity-50" type="text" class="form-control" value="Fecha: ">
                        <input disabled type="text" class="form-control" value="{{ \Carbon\Carbon::parse($compra->fecha_hora)->format('d-m-Y') }}">
                    </div>
                    
                </div>
            </div>

            <!---Hora-->
            <div class="row mb-1">
                <div class="col-sm-10">
                    <div class="input-group" id="hide-group">
                        <input disabled class="bg-success p-2 text-dark bg-opacity-50" type="text" class="form-control" value="Hora: ">
                        <input disabled type="text" class="form-control" value="{{ \Carbon\Carbon::parse($compra->fecha_hora)->format('H:i') }}">
                    </div>
                </div>
            </div>

            <!---Impuesto--->
            <div class="row mb-1">
                <div class="col-sm-10">
                    <div class="input-group" id="hide-group">
                        <input disabled class="bg-success p-2 text-dark bg-opacity-50" type="text" class="form-control" value="Impuesto: ">
                        <input disabled type="text" id="input-impuesto" class="form-control" value="{{ $compra->impuesto }}">
                    </div>
                </div>
            </div>

        </div>

        
    </div>


    <!---Tabla--->
    <div class="card col-6">
        <div class="card-body table-responsive">
            <table class="table table-striped">
                <thead class="bg-dark ">
                    <tr class="align-top">
                        <th class="text-white">Producto</th>
                        <th class="text-white">Cantidad</th>
                        <th class="text-white">Precio de compra</th>
                        <th class="text-white">Precio de venta</th>
                        <th class="text-white">Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($compra->productos as $item)
                    <tr>
                        <td>
                            {{$item->nombre}}
                        </td>
                        <td>
                            {{$item->pivot->cantidad}}
                        </td>
                        <td>
                            {{$item->pivot->precio_compra}}
                        </td>
                        <td>
                            {{$item->pivot->precio_venta}}
                        </td>
                        <td class="td-subtotal">
                            {{($item->pivot->cantidad) * ($item->pivot->precio_compra)}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="5"></th>
                    </tr>
                    <tr>
                        <th class="bg-success p-2 text-dark bg-opacity-25" colspan="4">Sumas:</th>
                        <th class="bg-success p-2 text-dark bg-opacity-10" id="th-suma"></th>
                    </tr>
                    <tr>
                        <th class="bg-success p-2 text-dark bg-opacity-25" colspan="4">IGV:</th>
                        <th class="bg-success p-2 text-dark bg-opacity-10" id="th-igv"></th>
                    </tr>
                    <tr>
                        <th class="bg-success p-2 text-dark bg-opacity-25" colspan="4">Total:</th>
                        <th class="bg-success p-2 text-dark bg-opacity-10" id="th-total"></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    </div>
    

</div>
@endsection

@push('js')
<script>
    //Variables
    let filasSubtotal = document.getElementsByClassName('td-subtotal');
    let cont = 0;
    let impuesto = $('#input-impuesto').val();

    $(document).ready(function() {
        calcularValores();
    });

    function calcularValores() {
        for (let i = 0; i < filasSubtotal.length; i++) {
            cont += parseFloat(filasSubtotal[i].innerHTML);
        }

        $('#th-suma').html(cont);
        $('#th-igv').html(impuesto);
        $('#th-total').html(round(cont + parseFloat(impuesto)));
    }

    function round(num, decimales = 2) {
        var signo = (num >= 0 ? 1 : -1);
        num = num * signo;
        if (decimales === 0) //con 0 decimales
            return signo * Math.round(num);
        // round(x * 10 ^ decimales)
        num = num.toString().split('e');
        num = Math.round(+(num[0] + 'e' + (num[1] ? (+num[1] + decimales) : decimales)));
        // x * 10 ^ (-decimales)
        num = num.toString().split('e');
        return signo * (num[0] + 'e' + (num[1] ? (+num[1] - decimales) : -decimales));
    }
    //Fuente: https://es.stackoverflow.com/questions/48958/redondear-a-dos-decimales-cuando-sea-necesario
</script>
@endpush
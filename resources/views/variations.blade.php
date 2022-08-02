@extends('core/base::layouts.master')

@section('content')
    <div class="card-body">
        <h1 class="page-title">Woocommerce Variations</h1>
            <div class="col-md-6">
                            <h6>{{ trans('plugins/wordpress-connector::wordpress-connector.options') }}</h6>
                             <a class="btn btn-warning" href="{{ route('wordpress-connector.syncvariations') }}">Export Variations</a>
                        </div>
  
            <table class="table table-striped table-bordered" id="example" style="width:100%">                
                <tr>
                    <th>ID</th>
                    <th>Nume produs</th>
                    <th>Cod</th>
                    <th>RP</th>
                    <th>SP</th>
                    <th>Stoc</th>
                </tr>
                @foreach($products as $product)
                <tr>
                    <td>{{ $product->id}}</td>
                    <td>{{ $product->nume_produs }}</td>
                    <td>{{ $product->sku }}</td>
                    <td>{{ $product->regular_price }}</td>
                    <td>{{ $product->sale_price }}</td>
                    <td>{{$product->stock_quantity}}</td>
                </tr>
                @endforeach
            </table>


        </div>
@stop

@extends('base')

@section('main-content')
    <div class="cust_card">
        <div class="header">
            <h2>List of Products</h2>
            <ul>
                <li>
                    <a href="{{ URL::to('products/new/') }}">ADD NEW</a>
                </li>
            </ul>
        </div>
        <div class="body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name of Product</th>
                        <th>Price</th>
                        <th class="text-center">Stock</th>
                        <th class="text-center">Status</th>
                        <th class="text-center"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $key=>$product)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $product->name }}</td>
                        <td>Rs.{{ $product->price }}</td>
                        <td class="text-center">{{ $product->stock }}</td>
                        <td class="text-center status">
                            @if($product->status==0)
                            <a href="#"><i class="fa fa-check"></i></a>
                            @else
                            <a href="#"><i class="fa fa-close"></i></a>
                            @endif
                        </td>
                        <td class="text-center action">
                            <a href="{{ URL::to('products/edit/'.$product->id) }}"><i class="fa fa-pencil"></i></a>
                            <a href="#"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

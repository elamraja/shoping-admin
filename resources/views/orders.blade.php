@extends('base')

@section('main-content')
    <div class="cust_card">
        <div class="header">
            <h2>List of Orders</h2>
        </div>
        <div class="body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Ordered By</th>
                        <th>Order Date</th>
                        <th>City</th>
                        <th>Mobile</th>
                        <th class="text-center">Order Amount</th>
                        <th class="text-center">Order Status</th>
                        <th class="text-center"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $key=>$order)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $order->user->name }}</td>
                        <td>{{ date('d-m-Y',strtotime($order->created_at)) }}</td>
                        <td>{{ $order->city }}</td>
                        <td>{{ $order->mobile }}</td>
                        <td class="text-center">
                            @php
                                $totalAmount=0;
                                foreach ($order->items as $item) {
                                   $totalAmount = $totalAmount + ($item['qty'] * $item['price']);
                                }
                            @endphp
                            {{ 'Rs.'.$totalAmount }}
                        </td>
                        <td class="text-center status">
                            @if($order->status=='created')
                                <span>Ordered</span>
                            @else
                                <span>Processing</span>
                            @endif
                        </td>
                        <td class="text-center action">
                            <a href="{{ URL::to('products/edit/'.$order->id) }}"><i class="fa fa-eye"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

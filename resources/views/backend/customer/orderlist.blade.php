@extends('layout.backend')
@section('content')
<div class="card shadow mb-4 p-4">
    @if (session('success'))
        <div class="alert alert-success">
            <ul>
                <li>{{ session('success')}}</li>
            </ul>
        </div>

        @endif
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Customer Order List</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>State</th>
                        <th>Township</th>
                        <th>Payment</th>
                        <th>Item Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->Checkout->name }}</td>
                        <td>{{ $order->Checkout->phone }}</td>
                        <td>{{ $order->Checkout->address }}</td>
                        <td>{{ $order->Checkout->state }}</td>
                        <td>{{ $order->Checkout->township }}</td>
                        <td>{{ $order->Checkout->payment }}</td>
                        <td>{{ optional($order->Item)->name }}</td>
                        <td>{{ $order->quantity }}</td>
                        <td>{{ $order->price }}</td>
                    <td class="">
                        <div class="d-flex">
                            <a href="{{ route('OrderDelete', $order->id )}}" class="btn btn-danger  btn-sm btn-icon-split me-3">
                                <span class="text">Delete</span>
                            </a>
                        </div>
                    </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>

@endsection

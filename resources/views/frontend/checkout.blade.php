@extends('layout.frontend')
@section('title')
    Welcome to TL Cosmetics
@endsection
@section('content')

    <div class="container mt-5">
        <form action="{{ route('PlaceOrder')}}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-body"> 
                            <h6>Basic Details</h6>
                            <hr>
                            <div class="row checkout-form">
                                <div class="col-md-6 mt-3">
                                    <label for="">Name</label>
                                    <input type="text" class="form-control" name="name" >
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Phone</label>
                                    <input type="text" class="form-control" name="phone" >
                                    @error('phone')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Address</label>
                                    <input type="text" class="form-control" name="address" >
                                    @error('address')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">State/Region</label>
                                    <input type="text" class="form-control" name="state" >
                                    @error('state')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Township</label>
                                    <input type="text" class="form-control" name="township" >
                                    @error('township')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Order Notes</label>
                                    <input type="text" class="form-control" name="ordernotes" >
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="payment">Payment Method</label>
                                    <select name="payment" id="payment" class="form-control">
                                        <option value="" disabled selected>-- Choose Payment --</option>
                                        <option value="KPay">KPay</option>
                                        <option value="Wave Money">Wave Money</option>
                                        <option value="CB pay">CB pay</option>
                                        <option value="UAB pay">UAB pay</option>
                                    </select>
                                    @error('payment')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <h6>Order Details</h6>
                           <hr>
                           <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cartitems as $item )
                                    <tr>
                                        <td>{{ $item->item->name }}</td>
                                        <td>{{ $item->quantity }}</td>
                                        <td>{{ $item->item->price }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                           </table>
                           <hr>
                           <button class="btn btn-primary float-end">Place Order</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>


@endsection

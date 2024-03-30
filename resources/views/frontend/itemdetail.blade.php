@extends('layout.frontend')
@section('content')
<section id="detail">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 img">
                <img src="{{ asset( $item->image )}}" alt="">
            </div>
            <div class="col-lg-6 text">
                <h5>{{ $item->name }}</h5>
                <h6>{{ $item->price }}</h6>
                <span>{{ $item->detail }}</span>
                <div class="quantity">
                    <button class="quantity-btn" id="decrease-btn">-</button>
                    <input type="text" class="quantity-input" value="1" readonly />
                    <button class="quantity-btn" id="increase-btn">+</button>
                </div>
                <button class="add-to-cart">Add to Cart</button>
                {{-- <form method="POST" action="{{ route() }}">
                    @csrf
                    <input type="hidden" name="item_id" value="{{ $item->id }}">
                    <button type="submit">Add to Favorites</button>
                </form> --}}
            </div>
        </div>
    </div>
</section>
@endsection

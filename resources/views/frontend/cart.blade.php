@extends('layout.frontend')
@section('content')
   <div class="container" style="margin-top: 30px;">
    <div class="card shadow ">
        <div class="card-header">
            <h5>My Shopping Bag</h5>
        </div>
        <div class="card-body">
            @php $total = 0; @endphp
            @foreach($cartitems as $item)
                <div class="product_data row">
                    <div class="col-md-2">
                        <img src="{{ asset('') }}" alt="">
                    </div>
                    <div class="col-md-3 my-auto">
                        <h3>{{ $item->item->name }}</h3>
                    </div>
                    <div class="col-md-2 my-auto">
                        <h3>{{ $item->item->price }}</h3>
                    </div>
                    <div class="col-md-3">
                        <input type="hidden" name="prod_id" class="prod_id" value="{{ $item->item_id }}">
                        <label for="Quantity">Quantity</label>
                        <div class="input-group text-center mb-3" style="width: 130px;">
                            <button class="input-group-text changeQuantity decrement-btn">-</button>
                            <input type="text" class="form-control qty-input text-center" value="{{ $item->quantity }}">
                            <button class="input-group-text changeQuantity increment-btn">+</button>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-danger delete-cart-item"><i class="fa fa-trash"></i> Remove</button>
                    </div>
                </div>
                {{-- @php $total += $item->item->price * $item->quantity ; @endphp --}}
                @php
        // Convert strings to integers
        $price = intval($item->item->price);
        $quantity = intval($item->quantity);

        // Check if conversion was successful before calculation
        if($price && $quantity) {
            $subtotal = $price * $quantity;
            $total += $subtotal;
        } else {
            // Output the non-numeric values for debugging
            echo "Non-numeric values encountered: ";
            echo "Price: " . $item->item->price . ", Quantity: " . $item->quantity;
        }
    @endphp
            @endforeach
        </div>
        <div class="card-footer">
            <h6>Total Price : {{ $total }}</h6>
            <a href="{{ url('checkout') }}"><button style="width: 250px;" class="btn btn-outline-success float-end">Proceed to Checkout</button></a>
        </div>
    </div>
   </div>
@endsection
@section('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        console.log("Document is ready.");

        // $('.addToCartBtn').click(function (e) {
        //     e.preventDefault();
        //     console.log("Add to Cart button clicked.");

        //     var product_id = $(this).closest('.product_data').find('.prod_id').val();
        //     var quantity = $(this).closest('.product_data').find('.qty-input').val();

        //     //console.log("Product ID: " + product_id + ", Quantity: " + quantity);

        //     $.ajaxSetup({
        //         headers: {
        //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //         }
        //     });
        //     $.ajax({
        //         method: "POST",
        //         url: "/add-to-cart",
        //         data: {
        //             'product_id' : product_id,
        //             'quantity' : quantity,
        //         },
        //         success: function(response){
        //             if (response.error) {
        //                 // Handle unauthenticated error
        //                 alert(response.error);
        //             } else {
        //                 // Display success message
        //                 alert(response.status);
        //             }
        //         },
        //         error: function(xhr, status, error) {
        //             // Handle other errors
        //             console.error(xhr.responseText);
        //         }
        //     });
        // });

        // Debug messages for increment button
        $('.increment-btn').click(function(e){
            e.preventDefault();

            var value = $(this).closest('.row').find('.qty-input').val();
            value = parseInt(value, 10);
            value = isNaN(value) ? 0 : value;
            if(value < 10){
                value++;
                $(this).closest('.row').find('.qty-input').val(value);
                updateTotalPrice();
            }

        });

        // Debug messages for decrement button
        $('.decrement-btn').click(function(e){
            e.preventDefault();

            var value = $(this).closest('.row').find('.qty-input').val();
            value = parseInt(value, 10);
            value = isNaN(value) ? 0 : value;
            if(value > 1){
                value--;
                $(this).closest('.row').find('.qty-input').val(value);
                updateTotalPrice();
            }
        });

        $('.delete-cart-item').click(function(e){
            e.preventDefault();
            var prod_id = $(this).closest('.product_data').find('.prod_id').val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                method: "POST",
                url: "delete-cart-item",
                data: {
                    'item_id' : prod_id
                },
                dataType: "json", // Change dataType to "json"
                success: function (response){
                    window.location.reload();
                    alert(response.status);
                }
            });
        });

        $('.changeQuantity').click(function(e) {
            e.preventDefault();

            var prod_id = $(this).closest('.product_data').find('.prod_id').val();
            var qty = $(this).closest('.product_data').find('.qty-input').val();

    // Send AJAX request to update cart
            $.ajax({
                type: "POST",
                url: "{{ route('UpdateCart') }}",
                data: {
                    'item_id': prod_id,
                    'quantity': qty,
                    '_token': '{{ csrf_token() }}'
                },
            dataType: "json",
                success: function(response) {
                    window.location.reload();
                    //alert(response.status);
                    // Update total price after successful quantity update
                    updateTotalPrice();
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    // Handle errors
                }
            });
        });

            // Function to update total price
        function updateTotalPrice() {
        var total = 0;
        $('.product_data').each(function() {
            var price = $(this).find('.col-md-2 h3').text();
            var quantity = $(this).find('.qty-input').val();
            price = parseFloat(price.replace(',', '')); // Remove commas if present
            quantity = parseInt(quantity, 10);
            total += price * quantity;
        });

        $('#totalPrice').text(total.toFixed(2)); // Update total price with 2 decimal places
    }

    });
</script>
@endsection

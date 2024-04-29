@extends('layout.frontend')
@section('content')
<script>
    window.onload = function() {
        // Add event listener for 'Add to Cart' button
        const addToCartBtn = document.querySelector('.addToCartBtn');
        addToCartBtn.addEventListener('click', function(event) {
            event.preventDefault();
            if (!isLoggedIn()) {
                alert("Please login to add items to your cart.");
            } else {

            }
        });

        // Add event listener for 'Add to Wishlist' button
        const addToWishlistBtn = document.querySelector('.addToWishlistBtn');
        addToWishlistBtn.addEventListener('click', function(event) {
            event.preventDefault();
            if (!isLoggedIn()) {
                alert("Please login to add items to your favorite list.");
            } else {
                // If user is logged in, submit the wishlist form
                var wishlistForm = this.closest('form');
                wishlistForm.submit();
            }
        });

        function isLoggedIn() {

            return {{ auth()->check() ? 'true' : 'false' }};
        }
    };
</script>



<section id="detail">

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

@if(session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
    <script>
        alert("{{ session('error') }}");
    </script>
</div>
@endif

    <div class="container-fluid">
        <div class="row product_data">
            <div class="col-lg-6 img">
                <img src="{{ asset($item->image) }}" alt="">
            </div>
            <div class="col-lg-6 text">
                <h5>{{ $item->name }}</h5><br>
                <h6>{{ $item->price }}</h6><br>
                <span>{{ $item->detail }}</span><br>
                <div class="col-md-3" style="margin-top: 10px;">
                    <input type="hidden" name="prod_id" value="{{ $item->id }}" class="prod_id">
                        <div class="input-group text-center mb-3" style="width: 130px;">
                            <button class="input-group-text decrement-btn">-</button>
                            <input type="text" class="form-control qty-input text-center" value="1">
                            <button class="input-group-text increment-btn">+</button>
                        </div>
                    <button class="addToCartBtn" style="width: 100px; background-color:lightsalmon; border: 1px solid lightsalmon; border-radius:5px;">Add to Cart</button><br>

                </div>
                <div style="margin-top: 20px;">
                    <form method="POST" action="{{ route('AddFavorite', $item->id) }}">
                        @csrf
                        <input type="hidden" name="item_id" value="{{ $item->id }}">
                        <i class="fa fa-heart" aria-hidden="true"></i>
                        <button type="submit" class="addToWishlistBtn" style="width: 200px; background-color:lightsalmon; border: 1px solid lightsalmon; border-radius:5px;">Add to wishlist</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        console.log("Document is ready.");

        $('.addToCartBtn').click(function (e) {
            e.preventDefault();
            console.log("Add to Cart button clicked.");

            var product_id = $(this).closest('.product_data').find('.prod_id').val();
            var quantity = $(this).closest('.product_data').find('.qty-input').val();

            //console.log("Product ID: " + product_id + ", Quantity: " + quantity);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                method: "POST",
                url: "/add-to-cart",
                data: {
                    'product_id' : product_id,
                    'quantity' : quantity,
                },
                success: function(response){
                    if (response.error) {
                        // Handle unauthenticated error
                        alert(response.error);
                    } else {
                        // Display success message
                        alert(response.status);
                    }
                },
                error: function(xhr, status, error) {
                    // Handle other errors
                    console.error(xhr.responseText);
                }
            });
        });

        // Debug messages for increment button
        $('.increment-btn').click(function(e){
            e.preventDefault();

            //var inc_value = $('.qty-input').val();
            var inc_value = $(this).closest('.product_data').find('.qty-input').val();
            var value = parseInt(inc_value, 10);
            value = isNaN(value) ? 0 : value;
            if(value < 10){
                value++;
                //$('.qty-input').val(value);
                $(this).closest('.product_data').find('.qty-input').val(value);
            }

        });


        // Debug messages for decrement button
        $('.decrement-btn').click(function(e){
            e.preventDefault();

            //var dec_value = $('.qty-input').val();
            var value = $(this).closest('.product_data').find('.qty-input').val();
            var value = parseInt(dec_value, 10);
            value = isNaN(value) ? 0 : value;
            if(value > 1){
                value--;
                //$('.qty-input').val(value);
                $(this).closest('.product_data').find('.qty-input').val(value);
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

            //Function to update total price
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

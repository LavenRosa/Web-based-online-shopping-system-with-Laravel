
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

            var value = $(this).closest('.row').find('.qty-input').val();
            value = parseInt(value, 10);
            value = isNaN(value) ? 0 : value;
            if(value < 10){
                value++;
                $(this).closest('.row').find('.qty-input').val(value);
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


<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Storing Billing - New Order</title>

    {{-- Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container-fluid p-2">

        {{-- Page Header --}}
        <nav class="navbar p-2 navbar-expand-lg bg-primary navbar-dark rounded">
            <div class="container-fluid">

                <a class="navbar-brand" href="#">
                    Storing Billing - New Order
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">

                    <span class="navbar-toggler-icon"></span>

                </button>

            </div>
        </nav>


        {{-- Customer Details --}}
        <div class="card mt-3 rounded-3">

            <div class="card-header bg-secondary">
                <h5 class="text-white mb-0">
                    Customer Details
                </h5>
            </div>

            <div class="card-body">

               
            </div>

        </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.21.0/dist/jquery.validate.min.js"></script>


    <script>
        // Recalculate a single product's line amount/tax/total and push into its hidden inputs
        function calculateLine(id) {

            let quantityInput = $('.product-quantity[data-id="' + id + '"]');

            let quantity = parseInt(quantityInput.val()) || 0;
            let price = parseFloat(quantityInput.data('price')) || 0;
            let taxPercent = parseFloat(quantityInput.data('tax')) || 0;

            let amount = quantity * price;
            let taxAmount = amount * (taxPercent / 100);
            let totalAmount = amount + taxAmount;
            let linePrice = price;
            let taxDetails = taxPercent;

            $('.product-amount[data-id="' + id + '"]').val(amount.toFixed(2));
            $('.product-price[data-id="' + id + '"]').val(linePrice.toFixed(2));
            $('.product-tax[data-id="' + id + '"]').val(taxDetails.toFixed(2));
            $('.product-tax-amount[data-id="' + id + '"]').val(taxAmount.toFixed(2));
            $('.product-total-amount[data-id="' + id + '"]').val(totalAmount.toFixed(2));

            $('.line-amount[data-id="' + id + '"]').text(amount.toFixed(2));
            $('.line-tax[data-id="' + id + '"]').text(taxAmount.toFixed(2));
        }

        // Recalculate the order-level grand totals from every product line
        function calculateGrandTotals() {

            let grandQuantity = 0;
            let grandAmount = 0;
            let grandTax = 0;
            let grandTotal = 0;

            $('.product-quantity').each(function() {

                let quantity = parseInt($(this).val()) || 0;
                let id = $(this).data('id');

                grandQuantity += quantity;
                grandAmount += parseFloat($('.product-amount[data-id="' + id + '"]').val()) || 0;
                grandTax += parseFloat($('.product-tax-amount[data-id="' + id + '"]').val()) || 0;
                grandTotal += parseFloat($('.product-total-amount[data-id="' + id + '"]').val()) || 0;

            });

            $('#grandQuantity').text(grandQuantity);
            $('#grandAmount').text(grandAmount.toFixed(2));
            $('#grandTax').text(grandTax.toFixed(2));
            $('#grandTotal').text(grandTotal.toFixed(2));

            $('#orderQuantityTotal').val(grandQuantity);
            $('#orderAmountTotal').val(grandAmount.toFixed(2));
            $('#orderTaxTotal').val(grandTax.toFixed(2));
            $('#orderGrandTotal').val(grandTotal.toFixed(2));
        }

        function recalcAll(id) {
            calculateLine(id);
            calculateGrandTotals();
        }

        $(document).on('click', '.add-product', function() {

            let id = $(this).data('id');

            let quantityInput = $('.product-quantity[data-id="' + id + '"]');

            let quantity = parseInt(quantityInput.val()) || 0;

            let stock = parseInt(quantityInput.data('stock')) || 0;


            if (quantity < stock) {

                quantityInput.val(quantity + 1);
                recalcAll(id);

            } else {

                alert('Stock limit reached');

            }

        });



        $(document).on('click', '.remove-product', function() {

            let id = $(this).data('id');

            let quantityInput = $('.product-quantity[data-id="' + id + '"]');

            let quantity = parseInt(quantityInput.val()) || 0;


            if (quantity > 0) {

                quantityInput.val(quantity - 1);
                recalcAll(id);

            }

        });

        $('#customer').on('submit', function(e) {


            $('.product-quantity').each(function() {

                let quantity = parseInt($(this).val()) || 0;

                if (quantity <= 0) {
                    let id = $(this).data('id');


                    $(this).remove();


                    $('input[name="products[' + id + '][product_id]"]').remove();
                    $('input[name="products[' + id + '][amount]"]').remove();
                    $('input[name="products[' + id + '][unit_price]"]').remove();
                    $('input[name="products[' + id + '][tax_percentage]"]').remove();
                    $('input[name="products[' + id + '][tax_amount]"]').remove();
                    $('input[name="products[' + id + '][total_amount]"]').remove();
                }
            });

        });
    </script>


    <script>
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#customer').validate({

                rules: {
                    customer_name: {
                        required: true
                    },

                    email: {
                        required: true,
                        email: true,
                        remote: {
                            url: '{{ 'email/unique' }}',
                            type: 'post',
                            data: {
                                email: function() {
                                    return $('#email').val();
                                }
                            }
                        }
                    }
                },

                messages: {
                    customer_name: {
                        required: "Please enter customer name"
                    },

                    email: {
                        required: "Please enter email",
                        email: "Invalid email format"
                    }
                },

                errorElement: 'span',

                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    error.insertAfter(element);
                },

                highlight: function(element) {
                    $(element).addClass('is-invalid');
                },

                unhighlight: function(element) {
                    $(element).removeClass('is-invalid');
                }

            });

        });
    </script>

</body>

</html>

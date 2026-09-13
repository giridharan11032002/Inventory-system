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

                <form id="customer" autocomplete="off" action="{{ url('generate/bill') }}" method="POST">

                    @csrf

                    {{-- Customer Details --}}
                    <div class="row">

                        <div class="col-md-6 mb-3">

                            <label for="customer_name" class="form-label">
                                Customer Name
                                <span class="text-danger">*</span>
                            </label>

                            <input type="text" name="customer_name" class="form-control" id="customer_name"
                                placeholder="Enter customer name">

                        </div>

                        <div class="col-md-6 mb-3">

                            <label for="email" class="form-label">
                                Email
                                <span class="text-danger">*</span>
                            </label>

                            <input type="email" name="email" class="form-control" id="email"
                                placeholder="Enter email address">

                        </div>

                    </div>


                    {{-- Product Details --}}
                    <div class="card mt-4 rounded-3">

                        <div class="card-header bg-primary">
                            <h5 class="text-white mb-0">
                                Product Details
                            </h5>
                        </div>

                        <div class="card-body">

                            <div class="row">

                                @foreach ($product as $item)
                                    <div class="col-lg-3 col-md-6 col-sm-12 mb-3">

                                        <div class="card h-100 shadow-sm">

                                            <div class="card-body">

                                                <h5 class="card-title">
                                                    {{ $item->name }}
                                                </h5>

                                                <div class="mb-2">
                                                    <label class="form-label fw-bold mb-0">
                                                        Price
                                                    </label>

                                                    <div>
                                                        ₹ {{ number_format($item->price, 2) }}
                                                    </div>
                                                </div>

                                                <div class="mb-2">
                                                    <label class="form-label fw-bold mb-0">
                                                        Stock
                                                    </label>

                                                    <div>
                                                        {{ $item->stock }}
                                                    </div>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label fw-bold mb-0">
                                                        Tax
                                                    </label>

                                                    <div>
                                                        {{ $item->tax_percentage }}%
                                                    </div>
                                                </div>

                                                {{-- Per-product line total / tax preview --}}
                                                <div class="mb-2 small text-muted">
                                                    Line Amount: ₹<span class="line-amount"
                                                        data-id="{{ $item->id }}">0.00</span>
                                                    &nbsp;|&nbsp;
                                                    Line Tax: ₹<span class="line-tax"
                                                        data-id="{{ $item->id }}">0.00</span>
                                                </div>

                                                <div class="d-flex align-items-center justify-content-center">

                                                    <button type="button" class="btn btn-danger btn-sm remove-product"
                                                        data-id="{{ $item->id }}">
                                                        −
                                                    </button>

                                                    <input type="text"
                                                        name="products[{{ $item->id }}][quantity]"
                                                        class="form-control text-center mx-2 product-quantity"
                                                        value="0" data-id="{{ $item->id }}"
                                                        data-stock="{{ $item->stock }}"
                                                        data-price="{{ $item->price }}"
                                                        data-tax="{{ $item->tax_percentage }}" readonly
                                                        style="width: 60px;">

                                                    <button type="button" class="btn btn-success btn-sm add-product"
                                                        data-id="{{ $item->id }}">
                                                        +
                                                    </button>

                                                </div>

                                                {{-- Hidden inputs submitted with the form --}}
                                                <input type="hidden" name="products[{{ $item->id }}][product_id]"
                                                    value="{{ $item->id }}">

                                                <input type="hidden" name="products[{{ $item->id }}][amount]"
                                                    class="product-amount" data-id="{{ $item->id }}"
                                                    value="0">
                                                <input type="hidden" name="products[{{ $item->id }}][ta]"
                                                    class="product-amount" data-id="{{ $item->id }}"
                                                    value="0">
                                                <input type="hidden" name="products[{{ $item->id }}][unit_price]"
                                                    class="product-price" data-id="{{ $item->id }}" value="0">

                                                <input type="hidden" name="products[{{ $item->id }}][tax_amount]"
                                                    class="product-tax-amount" data-id="{{ $item->id }}"
                                                    value="0">

                                                <input type="hidden"
                                                    name="products[{{ $item->id }}][total_amount]"
                                                    class="product-total-amount" data-id="{{ $item->id }}"
                                                    value="0">

                                            </div>

                                        </div>

                                    </div>
                                @endforeach

                            </div>

                        </div>

                    </div>

                    {{-- Order Summary --}}
                    <div class="card mt-4 rounded-3">

                        <div class="card-header bg-secondary">
                            <h5 class="text-white mb-0">
                                Order Summary
                            </h5>
                        </div>

                        <div class="card-body">

                            <div class="row text-end">

                                <div class="col-md-3 col-6 mb-2">
                                    <label class="form-label fw-bold mb-0">Total Quantity</label>
                                    <div id="grandQuantity">0</div>
                                </div>

                                <div class="col-md-3 col-6 mb-2">
                                    <label class="form-label fw-bold mb-0">Total Amount</label>
                                    <div>₹ <span id="grandAmount">0.00</span></div>
                                </div>

                                <div class="col-md-3 col-6 mb-2">
                                    <label class="form-label fw-bold mb-0">Total Tax</label>
                                    <div>₹ <span id="grandTax">0.00</span></div>
                                </div>

                                <div class="col-md-3 col-6 mb-2">
                                    <label class="form-label fw-bold mb-0">Grand Total</label>
                                    <div>₹ <span id="grandTotal">0.00</span></div>
                                </div>

                            </div>

                            {{-- Hidden inputs for order-level totals, submitted with the form --}}
                            <input type="hidden" name="order_quantity_total" id="orderQuantityTotal"
                                value="0">
                            <input type="hidden" name="order_amount_total" id="orderAmountTotal" value="0">
                            <input type="hidden" name="order_tax_total" id="orderTaxTotal" value="0">
                            <input type="hidden" name="order_grand_total" id="orderGrandTotal" value="0">

                        </div>

                    </div>


                    <div class="card mt-4 mb-4 rounded-3">

                        <div class="card-body text-end">

                            <button type="submit" class="btn btn-success btn-lg">
                                Generate Bill
                            </button>

                        </div>

                    </div>

                </form>
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

            $('.product-amount[data-id="' + id + '"]').val(amount.toFixed(2));
            $('.product-price[data-id="' + id + '"]').val(linePrice.toFixed(2));
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

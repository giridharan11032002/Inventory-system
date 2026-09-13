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

        <div class="container-fluid p-3">


            <div class="row mt-4">

                <div class="col-xl-6 col-lg-8 col-md-10 col-12">

                    <div class="card border-0 shadow-sm rounded-3">


                        <div class="card-header bg-secondary text-white rounded-top-3 py-3">
                            <h5 class="mb-0 fw-semibold">
                                Customer Details
                            </h5>
                        </div>


                        <div class="card-body p-4">

                            <div class="row g-4">


                                <div class="col-md-6">

                                    <label class="form-label text-muted small fw-semibold mb-1">
                                        Customer Name
                                    </label>

                                    <div class="fw-semibold fs-6">
                                        {{ $customer->name }}
                                    </div>

                                </div>



                                <div class="col-md-6">

                                    <label class="form-label text-muted small fw-semibold mb-1">
                                        Email
                                    </label>

                                    <div class="fw-semibold fs-6 text-break">
                                        {{ $customer->email }}
                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>
                @foreach ($orderItems as $item)
                    <div class="col-xl-6 col-lg-8 col-md-10 col-12">

                        <div class="card border-0 shadow-sm rounded-3">

                            <div class="card-header bg-secondary text-white rounded-top-3 py-3">
                                <h5 class="mb-0 fw-semibold">
                                    Product Details
                                </h5>
                            </div>

                            <div class="card-body p-4">


                                <div class="row g-4">

                                    {{-- Product Name --}}
                                    <div class="col-md-4">
                                        <label class="form-label text-muted small fw-semibold mb-1">
                                            Product Name
                                        </label>

                                        <div class="fw-semibold fs-6">
                                            {{ $item->product->name }}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label text-muted small fw-semibold mb-1">
                                            Quantity
                                        </label>

                                        <div class="fw-semibold fs-6">
                                            {{ $item->quantity }}
                                        </div>
                                    </div>


                                    <div class="col-md-4">
                                        <label class="form-label text-muted small fw-semibold mb-1">
                                            Amount
                                        </label>

                                        <div class="fw-semibold fs-6">
                                            ₹{{ number_format($item->line_total, 2) }}
                                        </div>
                                    </div>


                                    <div class="col-md-4">
                                        <label class="form-label text-muted small fw-semibold mb-1">
                                            Tax
                                        </label>

                                        <div class="fw-semibold fs-6">
                                            {{ number_format($item->tax_percentage, 2) }}%
                                        </div>
                                    </div>

                                </div>


                            </div>

                        </div>

                    </div>
                @endforeach

            </div>

            <div class="row mt-3 justify-content-center">
                <div class="col-xl-6 col-lg-8 col-md-10 col-12">

                    <div class="card border-0 shadow-sm rounded-3">


                        <div class="card-header bg-secondary text-white rounded-top-3 py-2">
                            <h6 class="mb-0 fw-semibold">
                                Payment
                            </h6>
                        </div>

                        <div class="card-body p-3">


                            <div class="d-flex justify-content-between mb-2">
                                <span class="text-muted small">
                                    Subtotal
                                </span>

                                <span class="fw-semibold">
                                    ₹{{ number_format($order->subtotal, 2) }}
                                </span>
                            </div>


                            <div class="d-flex justify-content-between mb-2">
                                <span class="text-muted small">
                                    Tax
                                </span>

                                <span class="fw-semibold">
                                    ₹{{ number_format($order->tax, 2) }}
                                </span>
                            </div>


                            <div class="d-flex justify-content-between border-top pt-2">
                                <span class="fw-semibold">
                                    Grand Total
                                </span>

                                <span class="fw-bold">
                                    ₹{{ number_format($order->grand_total, 2) }}
                                </span>
                            </div>


                            <div class="border-top border-2 border-secondary-subtle mt-2 pt-2">

                                <label for="amount_given" class="form-label small fw-semibold mb-1">
                                    Amount Given by Customer
                                </label>

                                <input type="number" name="amount_given" id="amount_given"
                                    class="form-control form-control-sm" placeholder="₹0.00"
                                    min="{{ $order->grand_total }}" step="0.01" required>

                            </div>


                            <div class="d-flex justify-content-between mt-3">

                                <span class="fw-semibold">
                                    Balance to Return:
                                </span>

                                <span class="fw-bold" id="balance_return">
                                    ₹0.00
                                </span>

                            </div>

                        </div>

                    </div>

                    <form  action="
                    "></form>

                </div>
            </div>

        </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.21.0/dist/jquery.validate.min.js"></script>


    <script>
        document.getElementById('amount_given').addEventListener('input', function() {

            let amountGiven = parseFloat(this.value) || 0;
            let grandTotal = {{ $order->grand_total }};

            let balance = amountGiven - grandTotal;

            if (balance < 0) {
                balance = 0;
            }

            document.getElementById('balance_return').textContent =
                '₹' + balance.toFixed(2);
        });
    </script>


</body>

</html>

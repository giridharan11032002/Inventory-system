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

            <div class="row">
                <div class="col-xl-6 col-lg-8 col-md-10 col-12">

                    <div class="card border-0 shadow-sm rounded-3">


                        <div class="card-header bg-secondary text-white rounded-top-3 py-3">
                            <h5 class="mb-0 fw-semibold">
                               Check O
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
            </div>

        </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.21.0/dist/jquery.validate.min.js"></script>




</body>

</html>

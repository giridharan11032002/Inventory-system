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
                   <div class="col-md-6">
                    <label for="customer_name" class="form-label">Customer Name</label>
                    <p>{{  }}</p>
                   </div>

            </div>

        </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.21.0/dist/jquery.validate.min.js"></script>




</body>

</html>

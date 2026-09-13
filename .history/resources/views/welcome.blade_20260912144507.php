<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ 'Storing Billing - New Order' }}</title>

    {{-- Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="fluid p-2">

        <nav class="navbar p-2 navbar-expand-lg bg-primary navbar-dark">
            <div class="container-fluid">

                <a class="navbar-brand" href="#">
                    {{ 'Storing Billing - New Order' }}
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>

            </div>
        </nav>

        <div class="card border-rounded mt-3">

            <div class=" card-header bg-primary p-1 pt-2">
                <h5 class="text-white p-2 mb-0">
                    Customer Details
                </h5>
            </div>

            <div class="row">
                <form id="customer" action="
                ">
                <div class="col-md-4">
                    <label for="customer_name" class="form-label">Customer Name</label>
                    <input type="text" name="customer_name" class="for" id="customer_name">
                </div>
            </form>
            </div>

        </div>

        <div class="container mt-4">

            <!-- Customer details fields will come here -->

        </div>

    </div>


    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>

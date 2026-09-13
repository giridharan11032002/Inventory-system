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

    <div class="container-fluid p-2">

        <!-- Page Header -->
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



        <div class="card mt-3 rounded-3">

            <div class="card-header bg-secondary">
                <h5 class="text-white mb-0">
                    Customer Details
                </h5>
            </div>


            <div class="card-body">

                <form id="customer" action="" method="POST">

                    <div class="row">


                        <div class="col-md-6 mb-3">
                            <label for="customer_name" class="form-label">
                                Customer Name <span class="text-danger">*</span>
                            </label>

                            <input type="text" name="customer_name" class="form-control" id="customer_name"
                                placeholder="Enter customer name">
                        </div>



                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label">
                                Email <span class="text-danger">*</span>
                            </label>

                            <input type="email" name="email" class="form-control" id="email"
                                placeholder="Enter email address">
                        </div>




                    </div>

                </form>

            </div>
        </div>




        <div class="card mt-4 rounded-3">

            <div class="card-header bg-primary d-flex align-items-center justify-content-between">

                <h5 class="text-white mb-0">
                    Product Details
                </h5>

               div.card
               

            </div>
           


            <div class="card-body">

                <!-- Product fields can be added here -->


                <!-- Button -->


            </div>

        </div>



    </div>




    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>

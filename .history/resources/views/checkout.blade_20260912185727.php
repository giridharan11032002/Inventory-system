<div class="container-fluid p-3">

    {{-- Page Header --}}
    <nav class="navbar navbar-expand-lg bg-primary navbar-dark rounded-3 shadow-sm px-3 py-2">
        <div class="container-fluid">

            <span class="navbar-brand fw-semibold mb-0">
                Storing Billing - New Order
            </span>

            <button class="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarNav"
                    aria-controls="navbarNav"
                    aria-expanded="false"
                    aria-label="Toggle navigation">

                <span class="navbar-toggler-icon"></span>
            </button>

        </div>
    </nav>


    {{-- Customer Details --}}
    <div class="row mt-4">

        <div class="col-xl-6 col-lg-8 col-md-10 col-12">

            <div class="card border-0 shadow-sm rounded-3">

                {{-- Card Header --}}
                <div class="card-header bg-secondary text-white rounded-top-3 py-3">
                    <h5 class="mb-0 fw-semibold">
                        Customer Details
                    </h5>
                </div>

                {{-- Card Body --}}
                <div class="card-body p-4">

                    <div class="row g-4">

                        {{-- Customer Name --}}
                        <div class="col-md-6">

                            <label class="form-label text-muted small fw-semibold mb-1">
                                Customer Name
                            </label>

                            <div class="fw-semibold fs-6">
                                {{ $customer->name }}
                            </div>

                        </div>


                        {{-- Email --}}
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
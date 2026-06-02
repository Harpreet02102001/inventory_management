<x-layout title="Supplier Details">
    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-start mb-4">

        <div>
            <h2 class="fw-bold mb-1">Supplier Details</h2>
            <p class="text-muted mb-0">
                View complete supplier information and linked products
            </p>
        </div>

        <div class="d-flex gap-2">

            <a href="{{ route('supplier.edit', $supplier->id) }}"
                class="btn btn-primary">
                <i class="bi bi-pencil me-2"></i>
                Edit Supplier
            </a>

            <a href="{{ route('supplier') }}"
                class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left me-2"></i>
                Back to Suppliers
            </a>

        </div>

    </div>

    <!-- Supplier Information -->
    <div class="card border-0 shadow-sm mb-4">

        <div class="card-body p-4">

            <h4 class="fw-semibold mb-4">
                Supplier Information
            </h4>

            <div class="row align-items-center">

                <!-- Icon -->
                <div class="col-lg-1 text-center">

                    <div class="rounded-circle bg-primary bg-opacity-10 d-inline-flex align-items-center justify-content-center"
                        style="width:90px;height:90px;">

                        <i class="bi bi-box-seam text-primary fs-1"></i>

                    </div>

                </div>

                <!-- Details Left -->
                <div class="col-lg-4">

                    <div class="mb-4">
                        <small class="text-muted d-block">
                            Name
                        </small>
                        <span class="fw-medium">
                            {{ $supplier->name }}
                        </span>
                    </div>

                    <div class="mb-4">
                        <small class="text-muted d-block">
                            Company Name
                        </small>
                        <span class="fw-medium">
                            {{ $supplier->company }}
                        </span>
                    </div>

                    <div>
                        <small class="text-muted d-block">
                            Email
                        </small>

                        <a href="mailto:{{ $supplier->email }}"
                            class="text-decoration-none">
                            {{ $supplier->email }}
                        </a>
                    </div>

                </div>

                <!-- Details Right -->
                <div class="col-lg-4 border-start">

                    <div class="ps-lg-4">

                        <div class="mb-4">
                            <small class="text-muted d-block">
                                Phone
                            </small>

                            <span class="fw-medium">
                                {{ $supplier->phone }}
                            </span>
                        </div>

                        <div class="mb-4">
                            <small class="text-muted d-block">
                                Address
                            </small>

                            <span class="fw-medium">
                                {{ $supplier->address }}
                            </span>
                        </div>

                        <div>
                            <small class="text-muted d-block">
                                Created Date
                            </small>

                            <span class="fw-medium">
                                {{ $supplier->created_at->format('M d, Y') }}
                            </span>
                        </div>

                    </div>

                </div>

                <!-- Product Counter -->
                <div class="col-lg-3">

                    <div class="border rounded text-center p-4">

                        <div class="rounded-circle bg-primary bg-opacity-10 d-inline-flex align-items-center justify-content-center mb-3"
                            style="width:70px;height:70px;">

                            <i class="bi bi-box-seam text-primary fs-3"></i>

                        </div>

                        <h6 class="text-muted">
                            Linked Products
                        </h6>

                        <h1 class="fw-bold text-primary">
                            {{ $supplier->products_count }}
                        </h1>

                        <p class="text-muted mb-0">
                            Products
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- Linked Products -->
    <div class="card border-0 shadow-sm">

        <div class="card-body">

            <h4 class="fw-semibold mb-4">
                Linked Products
            </h4>

            <div class="table-responsive">

                <table class="table align-middle">

                    <thead class="table-light">

                        <tr>
                            <th>Product Name</th>
                            <th>SKU</th>
                            <th>Category</th>
                            <th>Stock Quantity</th>
                            <th>Status</th>
                        </tr>

                    </thead>


                </table>

            </div>

        </div>

    </div>

</x-layout>
<x-layout title="Products">

    <!-- Page Header -->
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">

        <div>

            <h2 class="fw-bold mb-1">
                Products
            </h2>

            <p class="text-secondary mb-0">
                View and manage inventory products
            </p>

        </div>

        <a href="#"
            class="btn btn-primary">

            <i class="bi bi-plus-lg me-1"></i>

            Add Product

        </a>

    </div>

    <!-- Filters -->
    <div class="card border-0 shadow-sm rounded-4 mb-4">

        <div class="card-body p-3">

            <div class="row g-3">

                <!-- Search -->
                <div class="col-12 col-md-6 col-lg-3">

                    <label class="form-label small fw-semibold">
                        Search
                    </label>

                    <div class="input-group">

                        <span class="input-group-text bg-white">
                            <i class="bi bi-search"></i>
                        </span>

                        <input type="text"
                            class="form-control"
                            placeholder="Product or SKU">

                    </div>

                </div>

                <!-- Category -->
                <div class="col-6 col-md-3 col-lg-2">

                    <label class="form-label small fw-semibold">
                        Category
                    </label>

                    <select class="form-select">

                        <option>All</option>

                    </select>

                </div>

                <!-- Supplier -->
                <div class="col-6 col-md-3 col-lg-2">

                    <label class="form-label small fw-semibold">
                        Supplier
                    </label>

                    <select class="form-select">

                        <option>All</option>

                    </select>

                </div>

                <!-- Status -->
                <div class="col-6 col-md-3 col-lg-2">

                    <label class="form-label small fw-semibold">
                        Status
                    </label>

                    <select class="form-select">

                        <option>All</option>

                    </select>

                </div>

                <!-- Low Stock -->
                <div class="col-6 col-md-3 col-lg-2">

                    <label class="form-label small fw-semibold">
                        Stock
                    </label>

                    <select class="form-select">

                        <option>All</option>
                        <option>Low Stock</option>

                    </select>

                </div>

                <!-- Reset -->
                <div class="col-12 col-lg-1 d-grid">

                    <label class="form-label small opacity-0">
                        Reset
                    </label>

                    <button class="btn btn-outline-secondary">

                        <i class="bi bi-arrow-clockwise"></i>

                    </button>

                </div>

            </div>

        </div>

    </div>

    <!-- Info Alert -->
    <div class="alert alert-primary d-flex align-items-start gap-2 py-2 rounded-3 small mb-4">

        <i class="bi bi-info-circle-fill mt-1"></i>

        <div>

            Staff users can only view and update stock.

        </div>

    </div>

    <!-- Product Table -->
    <div class="card border-0 shadow-sm rounded-4">

        <div class="card-body p-0">

            <div class="table-responsive">

                <table class="table align-middle table-hover mb-0">

                    <thead class="table-light">

                        <tr class="small text-nowrap">

                            <th class="ps-3">Image</th>
                            <th>Product</th>
                            <th>SKU</th>
                            <th>Category</th>
                            <th>Supplier</th>
                            <th>Buy</th>
                            <th>Sell</th>
                            <th>Stock</th>
                            <th>Status</th>
                            <th class="text-center pe-3">Actions</th>

                        </tr>

                    </thead>

                    <tbody>

                        <!-- Row -->
                        <tr>

                            <td class="ps-3">

                                <img src="https://images.unsplash.com/photo-1527814050087-3793815479db?q=80&w=300"
                                    class="rounded border"
                                    width="45"
                                    height="45"
                                    style="object-fit:cover;">

                            </td>

                            <td class="fw-semibold">
                                Wireless Mouse
                            </td>

                            <td>WM-001</td>

                            <td>Accessories</td>

                            <td>TechSource</td>

                            <td>$10</td>

                            <td>$18</td>

                            <td>45</td>

                            <td>

                                <span class="badge bg-success-subtle text-success">

                                    Active

                                </span>

                            </td>

                            <td class="pe-3">

                                <div class="d-flex justify-content-center gap-1 flex-wrap">

                                    <button class="btn btn-sm btn-light border">
                                        <i class="bi bi-eye"></i>
                                    </button>

                                    <button class="btn btn-sm btn-light border">
                                        <i class="bi bi-pencil"></i>
                                    </button>

                                    <button class="btn btn-sm btn-light border text-danger">
                                        <i class="bi bi-trash"></i>
                                    </button>

                                    <button class="btn btn-sm btn-light border">
                                        <i class="bi bi-box"></i>
                                    </button>

                                </div>

                            </td>

                        </tr>

                        <!-- Low Stock -->
                        <tr class="table-warning bg-opacity-10">

                            <td class="ps-3">

                                <img src="https://images.unsplash.com/photo-1505843490701-5be5d1b65c34?q=80&w=300"
                                    class="rounded border"
                                    width="45"
                                    height="45"
                                    style="object-fit:cover;">

                            </td>

                            <td class="fw-semibold">
                                Office Chair
                            </td>

                            <td>OC-101</td>

                            <td>Furniture</td>

                            <td>Global Co.</td>

                            <td>$85</td>

                            <td>$129</td>

                            <td>

                                <span class="text-danger fw-bold">
                                    6
                                </span>

                            </td>

                            <td>

                                <span class="badge bg-warning-subtle text-warning">

                                    Low

                                </span>

                            </td>

                            <td class="pe-3">

                                <div class="d-flex justify-content-center gap-1 flex-wrap">

                                    <button class="btn btn-sm btn-light border">
                                        <i class="bi bi-eye"></i>
                                    </button>

                                    <button class="btn btn-sm btn-light border">
                                        <i class="bi bi-pencil"></i>
                                    </button>

                                    <button class="btn btn-sm btn-light border text-danger">
                                        <i class="bi bi-trash"></i>
                                    </button>

                                    <button class="btn btn-sm btn-light border">
                                        <i class="bi bi-box"></i>
                                    </button>

                                </div>

                            </td>

                        </tr>

                        <!-- Row -->
                        <tr>

                            <td class="ps-3">

                                <img src="https://images.unsplash.com/photo-1580901368919-7738efb0f87e?q=80&w=300"
                                    class="rounded border"
                                    width="45"
                                    height="45"
                                    style="object-fit:cover;">

                            </td>

                            <td class="fw-semibold">
                                USB Cable
                            </td>

                            <td>USB-CB-01</td>

                            <td>Accessories</td>

                            <td>OfficeMax</td>

                            <td>$2</td>

                            <td>$4</td>

                            <td>120</td>

                            <td>

                                <span class="badge bg-success-subtle text-success">

                                    Active

                                </span>

                            </td>

                            <td class="pe-3">

                                <div class="d-flex justify-content-center gap-1 flex-wrap">

                                    <button class="btn btn-sm btn-light border">
                                        <i class="bi bi-eye"></i>
                                    </button>

                                    <button class="btn btn-sm btn-light border">
                                        <i class="bi bi-pencil"></i>
                                    </button>

                                    <button class="btn btn-sm btn-light border text-danger">
                                        <i class="bi bi-trash"></i>
                                    </button>

                                    <button class="btn btn-sm btn-light border">
                                        <i class="bi bi-box"></i>
                                    </button>

                                </div>

                            </td>

                        </tr>

                    </tbody>

                </table>

            </div>

            <!-- Footer -->
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center gap-3 p-3">

                <small class="text-secondary">

                    Showing 1 to 6 of 24 products

                </small>

                <!-- Pagination -->
                <nav>

                    <ul class="pagination pagination-sm mb-0">

                        <li class="page-item">

                            <a class="page-link" href="#">
                                Prev
                            </a>

                        </li>

                        <li class="page-item active">

                            <a class="page-link" href="#">
                                1
                            </a>

                        </li>

                        <li class="page-item">

                            <a class="page-link" href="#">
                                2
                            </a>

                        </li>

                        <li class="page-item">

                            <a class="page-link" href="#">
                                Next
                            </a>

                        </li>

                    </ul>

                </nav>

            </div>

        </div>

    </div>

</x-layout>
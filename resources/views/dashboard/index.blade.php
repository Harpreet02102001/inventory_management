<x-layout title="Dashboard">

    <!-- Page Heading -->
    <div class="mb-4">

        <h1 class="fw-bold dashboard-title">
            Admin Dashboard
        </h1>

        <p class="text-muted dashboard-subtitle">
            Inventory summary and recent stock activity
        </p>

    </div>

    <!-- Statistics Cards -->
    <div class="row g-3 mb-4">

        <!-- Total Products -->
        <div class="col-lg-3 col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <small class="text-muted">Total Products</small>
                        <h3 class="fw-bold mb-0">248</h3>
                    </div>
                    <div class="bg-primary bg-opacity-10 p-3 rounded">
                        <i class="bi bi-box fs-4 text-primary"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Categories -->
        <div class="col-lg-3 col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <small class="text-muted">Categories</small>
                        <h3 class="fw-bold mb-0">18</h3>
                    </div>
                    <div class="bg-success bg-opacity-10 p-3 rounded">
                        <i class="bi bi-folder fs-4 text-success"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Suppliers -->
        <div class="col-lg-3 col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <small class="text-muted">Suppliers</small>
                        <h3 class="fw-bold mb-0">34</h3>
                    </div>
                    <div class="bg-info bg-opacity-10 p-3 rounded">
                        <i class="bi bi-people fs-4 text-info"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Low Stock -->
        <div class="col-lg-3 col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <small class="text-muted">Low Stock Products</small>
                        <h3 class="fw-bold mb-0 text-warning">12</h3>
                        <span class="badge bg-warning text-dark mt-1">
                            Needs Attention
                        </span>
                    </div>
                    <div class="bg-warning bg-opacity-10 p-3 rounded">
                        <i class="bi bi-exclamation-triangle fs-4 text-warning"></i>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Tables Row -->
    <div class="row g-4">

        <!-- Low Stock Products -->
        <div class="col-lg-7">

            <div class="dashboard-table-card">

                <div class="table-title">

                    <div class="table-icon warning-icon">
                        <i class="bi bi-exclamation-triangle-fill"></i>
                    </div>

                    <h5>
                        Low Stock Products
                    </h5>

                </div>

                <div class="table-responsive">

                    <table class="table align-middle">

                        <thead>

                            <tr>
                                <th>Product Name</th>
                                <th>SKU</th>
                                <th>Category</th>
                                <th>Current Stock</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>

                        </thead>

                        <tbody>

                            <tr>
                                <td>Wireless Mouse</td>
                                <td>SKU-1001</td>
                                <td>Accessories</td>
                                <td>5</td>

                                <td>
                                    <span class="table-badge warning-badge">
                                        Low Stock
                                    </span>
                                </td>

                                <td>
                                    <button class="btn btn-sm btn-outline-primary">
                                        View
                                    </button>
                                </td>
                            </tr>

                            <tr>
                                <td>Office Chair</td>
                                <td>SKU-1042</td>
                                <td>Furniture</td>
                                <td>3</td>

                                <td>
                                    <span class="table-badge warning-badge">
                                        Low Stock
                                    </span>
                                </td>

                                <td>
                                    <button class="btn btn-sm btn-outline-primary">
                                        View
                                    </button>
                                </td>
                            </tr>

                            <tr>
                                <td>USB Cable</td>
                                <td>SKU-1088</td>
                                <td>Electronics</td>
                                <td>7</td>

                                <td>
                                    <span class="table-badge warning-badge">
                                        Low Stock
                                    </span>
                                </td>

                                <td>
                                    <button class="btn btn-sm btn-outline-primary">
                                        View
                                    </button>
                                </td>
                            </tr>

                            <tr>
                                <td>Monitor 24"</td>
                                <td>SKU-1023</td>
                                <td>Electronics</td>
                                <td>4</td>

                                <td>
                                    <span class="table-badge warning-badge">
                                        Low Stock
                                    </span>
                                </td>

                                <td>
                                    <button class="btn btn-sm btn-outline-primary">
                                        View
                                    </button>
                                </td>
                            </tr>

                            <tr>
                                <td>Printer Ink Cartridge</td>
                                <td>SKU-1105</td>
                                <td>Consumables</td>
                                <td>2</td>

                                <td>
                                    <span class="table-badge warning-badge">
                                        Low Stock
                                    </span>
                                </td>

                                <td>
                                    <button class="btn btn-sm btn-outline-primary">
                                        View
                                    </button>
                                </td>
                            </tr>

                        </tbody>

                    </table>

                </div>

                <div class="table-footer-link">
                    <a href="#">
                        View all low stock products
                        <i class="bi bi-chevron-right"></i>
                    </a>
                </div>

            </div>

        </div>

        <!-- Recent Stock Updates -->
        <div class="col-lg-5">

            <div class="dashboard-table-card">

                <div class="table-title">

                    <div class="table-icon primary-icon">
                        <i class="bi bi-clock-history"></i>
                    </div>

                    <h5>
                        Recent Stock Updates
                    </h5>

                </div>

                <div class="table-responsive">

                    <table class="table align-middle">

                        <thead>

                            <tr>
                                <th>Product</th>
                                <th>Type</th>
                                <th>Changed Qty</th>
                                <th>Updated By</th>
                                <th>Time</th>
                            </tr>

                        </thead>

                        <tbody>

                            <tr>
                                <td>Laptop Stand</td>

                                <td>
                                    <span class="table-badge success-badge">
                                        Added
                                    </span>
                                </td>

                                <td class="text-success fw-bold">
                                    +10
                                </td>

                                <td>Admin User</td>

                                <td>10:45 AM</td>
                            </tr>

                            <tr>
                                <td>Keyboard</td>

                                <td>
                                    <span class="table-badge danger-badge">
                                        Reduced
                                    </span>
                                </td>

                                <td class="text-danger fw-bold">
                                    -2
                                </td>

                                <td>Staff A</td>

                                <td>09:20 AM</td>
                            </tr>

                            <tr>
                                <td>Wireless Mouse</td>

                                <td>
                                    <span class="table-badge success-badge">
                                        Added
                                    </span>
                                </td>

                                <td class="text-success fw-bold">
                                    +5
                                </td>

                                <td>Staff B</td>

                                <td>08:55 AM</td>
                            </tr>

                            <tr>
                                <td>Office Chair</td>

                                <td>
                                    <span class="table-badge danger-badge">
                                        Reduced
                                    </span>
                                </td>

                                <td class="text-danger fw-bold">
                                    -1
                                </td>

                                <td>Admin User</td>

                                <td>08:30 AM</td>
                            </tr>

                            <tr>
                                <td>USB Cable</td>

                                <td>
                                    <span class="table-badge success-badge">
                                        Added
                                    </span>
                                </td>

                                <td class="text-success fw-bold">
                                    +15
                                </td>

                                <td>Staff A</td>

                                <td>Yesterday</td>
                            </tr>

                        </tbody>

                    </table>

                </div>

                <div class="table-footer-link">
                    <a href="#">
                        View all stock updates
                        <i class="bi bi-chevron-right"></i>
                    </a>
                </div>

            </div>

        </div>

    </div>

</x-layout>
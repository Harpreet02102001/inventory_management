<x-layout title="Stock History">

    <!-- Page Header -->
    <div class="mb-4">

        <h1 class="fw-bold display-6 mb-1">
            Stock History
        </h1>

        <p class="text-secondary fs-5">
            Track all stock movement records
        </p>

    </div>

    <!-- Filters Card -->
    <div class="card border-0 shadow-sm rounded-4 mb-4">

        <div class="card-body p-4">

            <div class="row g-4 align-items-end">

                <!-- Search -->
                <div class="col-lg-3">

                    <label class="form-label fw-semibold">
                        Search
                    </label>

                    <div class="input-group input-group-lg">

                        <span class="input-group-text bg-white">
                            <i class="bi bi-search"></i>
                        </span>

                        <input type="text"
                            class="form-control"
                            placeholder="Search by product name or SKU">

                    </div>

                </div>

                <!-- Type -->
                <div class="col-lg-2">

                    <label class="form-label fw-semibold">
                        Type
                    </label>

                    <select class="form-select form-select-lg">

                        <option>All Types</option>
                        <option>Add</option>
                        <option>Reduce</option>

                    </select>

                </div>

                <!-- Date From -->
                <div class="col-lg-2">

                    <label class="form-label fw-semibold">
                        Date Range
                    </label>

                    <input type="date"
                        class="form-control form-control-lg">

                </div>

                <!-- Date To -->
                <div class="col-lg-2">

                    <label class="form-label fw-semibold invisible">
                        To
                    </label>

                    <input type="date"
                        class="form-control form-control-lg">

                </div>

                <!-- User -->
                <div class="col-lg-2">

                    <label class="form-label fw-semibold">
                        Updated By
                    </label>

                    <select class="form-select form-select-lg">

                        <option>All Users</option>
                        <option>Admin User</option>
                        <option>Staff User</option>

                    </select>

                </div>

                <!-- Reset -->
                <div class="col-lg-1">

                    <button class="btn btn-light border btn-lg w-100">

                        <i class="bi bi-arrow-counterclockwise me-2"></i>

                        Reset

                    </button>

                </div>

            </div>

        </div>

    </div>

    <!-- Table Card -->
    <div class="card border-0 shadow-sm rounded-4">

        <div class="card-body p-0">

            <div class="table-responsive">

                <table class="table align-middle mb-0">

                    <thead class="table-light">

                        <tr>

                            <th class="px-4 py-3">Date & Time</th>
                            <th class="py-3">Product</th>
                            <th class="py-3">SKU</th>
                            <th class="py-3">Old Quantity</th>
                            <th class="py-3">Changed Quantity</th>
                            <th class="py-3">New Quantity</th>
                            <th class="py-3">Type</th>
                            <th class="py-3">Updated By</th>
                            <th class="py-3">Remarks</th>

                        </tr>

                    </thead>

                    <tbody>

                        <!-- Row -->
                        <tr>

                            <td class="px-4">
                                May 27, 2025 10:15 AM
                            </td>

                            <td>Wireless Mouse</td>

                            <td>WM-001</td>

                            <td>45</td>

                            <td class="text-success fw-bold">
                                +15
                            </td>

                            <td>60</td>

                            <td>
                                <span class="badge bg-success-subtle text-success px-3 py-2 rounded-pill">
                                    Add
                                </span>
                            </td>

                            <td>Admin User</td>

                            <td>Restocked from supplier</td>

                        </tr>

                        <!-- Row -->
                        <tr>

                            <td class="px-4">
                                May 27, 2025 09:02 AM
                            </td>

                            <td>USB Cable</td>

                            <td>USB-003</td>

                            <td>120</td>

                            <td class="text-danger fw-bold">
                                -20
                            </td>

                            <td>100</td>

                            <td>
                                <span class="badge bg-danger-subtle text-danger px-3 py-2 rounded-pill">
                                    Reduce
                                </span>
                            </td>

                            <td>Staff User</td>

                            <td>Sold items</td>

                        </tr>

                        <!-- Row -->
                        <tr>

                            <td class="px-4">
                                May 26, 2025 04:45 PM
                            </td>

                            <td>Office Chair</td>

                            <td>OC-002</td>

                            <td>18</td>

                            <td class="text-success fw-bold">
                                +12
                            </td>

                            <td>30</td>

                            <td>
                                <span class="badge bg-success-subtle text-success px-3 py-2 rounded-pill">
                                    Add
                                </span>
                            </td>

                            <td>Admin User</td>

                            <td>Restocked from supplier</td>

                        </tr>

                        <!-- Row -->
                        <tr>

                            <td class="px-4">
                                May 26, 2025 11:30 AM
                            </td>

                            <td>Monitor 24"</td>

                            <td>MON-024</td>

                            <td>25</td>

                            <td class="text-danger fw-bold">
                                -5
                            </td>

                            <td>20</td>

                            <td>
                                <span class="badge bg-danger-subtle text-danger px-3 py-2 rounded-pill">
                                    Reduce
                                </span>
                            </td>

                            <td>Staff User</td>

                            <td>Sold items</td>

                        </tr>

                        <!-- Row -->
                        <tr>

                            <td class="px-4">
                                May 25, 2025 03:20 PM
                            </td>

                            <td>Keyboard</td>

                            <td>KB-001</td>

                            <td>40</td>

                            <td class="text-danger fw-bold">
                                -3
                            </td>

                            <td>37</td>

                            <td>
                                <span class="badge bg-danger-subtle text-danger px-3 py-2 rounded-pill">
                                    Reduce
                                </span>
                            </td>

                            <td>Staff User</td>

                            <td>Damaged stock removed</td>

                        </tr>

                    </tbody>

                </table>

            </div>

            <!-- Footer -->
            <div class="d-flex justify-content-between align-items-center p-4 flex-wrap gap-3">

                <div class="text-secondary">

                    Showing 1 to 8 of 42 stock records

                </div>

                <!-- Pagination -->
                <nav>

                    <ul class="pagination mb-0">

                        <li class="page-item">
                            <a class="page-link" href="#">
                                Previous
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
                                3
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

    <!-- Info Alert -->
    <div class="alert alert-primary mt-4 rounded-4 d-flex align-items-center">

        <i class="bi bi-info-circle-fill me-3 fs-4"></i>

        Stock history shows all quantity changes, including additions,
        reductions, and manual adjustments.
        <h1>Hello Usser </h1>
    </div>

</x-layout>
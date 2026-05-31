<x-layout title="Categories">

    <!-- Header -->
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">

        <div>
            <h2 class="fw-bold mb-1">Categories</h2>
            <p class="text-muted mb-0">
                View and manage product categories
            </p>
        </div>

        <a href="{{ route('category.create') }}"
            class="btn btn-primary">
            <i class="bi bi-plus-lg me-1"></i>
            Add Category
        </a>

    </div>

    <!-- Filters -->
    <div class="card border-0 shadow-sm mb-4">

        <div class="card-body">

            <div class="row g-3 align-items-end">

                <div class="col-md-6">
                    <label class="form-label small fw-semibold">
                        Search Category
                    </label>

                    <div class="input-group">

                        <span class="input-group-text bg-white">
                            <i class="bi bi-search"></i>
                        </span>

                        <input type="text"
                            class="form-control"
                            placeholder="Search by category name">

                    </div>

                </div>

                <div class="col-md-4">
                    <label class="form-label small fw-semibold">
                        Status
                    </label>

                    <select class="form-select">

                        <option>All</option>
                        <option>Active</option>
                        <option>Inactive</option>

                    </select>
                </div>

                <div class="col-md-2 d-grid">

                    <button class="btn btn-outline-secondary">

                        <i class="bi bi-arrow-clockwise me-1"></i>
                        Reset

                    </button>

                </div>

            </div>

        </div>

    </div>

    <!-- Category Table -->
    <div class="card border-0 shadow-sm">

        <div class="card-body p-0">

            <div class="table-responsive">

                <table class="table table-hover align-middle mb-0">

                    <thead class="table-light">

                        <tr>

                            <th>#</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Products</th>
                            <th>Created</th>
                            <th class="text-center">Actions</th>

                        </tr>

                    </thead>

                    <tbody>

                        <tr>

                            <td>1</td>

                            <td class="fw-semibold">
                                Electronics
                            </td>

                            <td>
                                Electronic devices and gadgets
                            </td>

                            <td>

                                <span class="badge bg-success-subtle text-success">
                                    Active
                                </span>

                            </td>

                            <td>27</td>

                            <td>May 10, 2024</td>

                            <td>

                                <div class="d-flex justify-content-center gap-1">

                                    <button class="btn btn-sm btn-outline-primary">
                                        <i class="bi bi-eye"></i>
                                    </button>

                                    <button class="btn btn-sm btn-outline-warning">
                                        <i class="bi bi-pencil"></i>
                                    </button>

                                    <button class="btn btn-sm btn-outline-danger">
                                        <i class="bi bi-trash"></i>
                                    </button>

                                </div>

                            </td>

                        </tr>

                        <tr>

                            <td>2</td>

                            <td class="fw-semibold">
                                Furniture
                            </td>

                            <td>
                                Office and home furniture
                            </td>

                            <td>

                                <span class="badge bg-success-subtle text-success">
                                    Active
                                </span>

                            </td>

                            <td>14</td>

                            <td>May 12, 2024</td>

                            <td>

                                <div class="d-flex justify-content-center gap-1">

                                    <button class="btn btn-sm btn-outline-primary">
                                        <i class="bi bi-eye"></i>
                                    </button>

                                    <button class="btn btn-sm btn-outline-warning">
                                        <i class="bi bi-pencil"></i>
                                    </button>

                                    <button class="btn btn-sm btn-outline-danger">
                                        <i class="bi bi-trash"></i>
                                    </button>

                                </div>

                            </td>

                        </tr>

                        <tr>

                            <td>3</td>

                            <td class="fw-semibold">
                                Accessories
                            </td>

                            <td>
                                Mobile and computer accessories
                            </td>

                            <td>

                                <span class="badge bg-success-subtle text-success">
                                    Active
                                </span>

                            </td>

                            <td>32</td>

                            <td>May 15, 2024</td>

                            <td>

                                <div class="d-flex justify-content-center gap-1">

                                    <button class="btn btn-sm btn-outline-primary">
                                        <i class="bi bi-eye"></i>
                                    </button>

                                    <button class="btn btn-sm btn-outline-warning">
                                        <i class="bi bi-pencil"></i>
                                    </button>

                                    <button class="btn btn-sm btn-outline-secondary"
                                        disabled>
                                        <i class="bi bi-lock"></i>
                                    </button>

                                </div>

                            </td>

                        </tr>

                    </tbody>

                </table>

            </div>

            <!-- Footer -->
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center gap-3 p-3">

                <small class="text-muted">
                    Showing 1 to 6 of 6 categories
                </small>

                <nav>

                    <ul class="pagination pagination-sm mb-0">

                        <li class="page-item disabled">
                            <a class="page-link">
                                Previous
                            </a>
                        </li>

                        <li class="page-item active">
                            <a class="page-link">1</a>
                        </li>

                        <li class="page-item">
                            <a class="page-link">Next</a>
                        </li>

                    </ul>

                </nav>

            </div>

        </div>

    </div>

</x-layout>
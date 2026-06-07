    <x-layout title="Stock History">

        <!-- Page Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>
                <h2 class="fw-bold mb-1">
                    Stock History
                </h2>

                <p class="text-secondary fs-5 mb-0">
                    Track all stock movement records
                </p>
            </div>

            <a href="{{route('stock.view')}}"
                class="btn btn-warning btn-sm">
                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                Low Stock Items
            </a>

        </div>

        <!-- Filters Card -->
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-body">

                <div class="row g-2 align-items-end">

                    <!-- Search -->
                    <div class="col-12 col-md-6 col-lg-3">

                        <label class="form-label small fw-semibold mb-1">
                            Search
                        </label>

                        <div class="input-group">

                            <span class="input-group-text">
                                <i class="bi bi-search"></i>
                            </span>

                            <input type="text"
                                class="form-control"
                                placeholder="Product / SKU">

                        </div>

                    </div>

                    <!-- Type -->
                    <div class="col-6 col-md-3 col-lg-2">

                        <label class="form-label small fw-semibold mb-1">
                            Type
                        </label>

                        <select class="form-select">

                            <option>All</option>
                            <option>Add</option>
                            <option>Reduce</option>

                        </select>

                    </div>

                    <!-- Date From -->
                    <div class="col-6 col-md-3 col-lg-2">

                        <label class="form-label small fw-semibold mb-1">
                            From
                        </label>

                        <input type="date"
                            class="form-control">

                    </div>

                    <!-- Date To -->
                    <div class="col-6 col-md-3 col-lg-2">

                        <label class="form-label small fw-semibold mb-1">
                            To
                        </label>

                        <input type="date"
                            class="form-control">

                    </div>

                    <!-- User -->
                    <div class="col-6 col-md-3 col-lg-2">

                        <label class="form-label small fw-semibold mb-1">
                            User
                        </label>

                        <select class="form-select">

                            <option>All Users</option>
                            <option>Admin</option>
                            <option>Staff</option>

                        </select>

                    </div>

                    <!-- Reset -->
                    <div class="col-12 col-lg-1">

                        <button class="btn btn-outline-secondary w-100">

                            <i class="bi bi-arrow-clockwise"></i>

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

                            @forelse ($stockHistories as $history)

                            <tr>

                                <td class="px-4">
                                    {{ $history->created_at->format('M d, Y h:i A') }}
                                </td>

                                <td>
                                    {{ $history->product->name ?? 'N/A' }}
                                </td>

                                <td>
                                    {{ $history->product->sku ?? 'N/A' }}
                                </td>

                                <td>
                                    {{ $history->old_quantity }}
                                </td>

                                <td class="{{ $history->quantity_changed < 0 ? 'text-danger' : 'text-success' }} fw-bold">

                                    {{ $history->quantity_changed > 0 ? '+' : '' }}
                                    {{ $history->quantity_changed }}

                                </td>

                                <td>
                                    {{ $history->new_quantity }}
                                </td>

                                <td>

                                    @if($history->type == 'IN')

                                    <span class="badge bg-success-subtle text-success px-3 py-2 rounded-pill">
                                        Stock In
                                    </span>

                                    @elseif($history->type == 'OUT')

                                    <span class="badge bg-danger-subtle text-danger px-3 py-2 rounded-pill">
                                        Stock Out
                                    </span>

                                    @else

                                    <span class="badge bg-warning-subtle text-warning px-3 py-2 rounded-pill">
                                        Adjustment
                                    </span>

                                    @endif

                                </td>

                                <td>
                                    {{ $history->user->name ?? 'N/A' }}
                                </td>

                                <td>
                                    {{ $history->remarks ?? '-' }}
                                </td>

                            </tr>

                            @empty

                            <tr>

                                <td colspan="9" class="text-center py-4 text-muted">

                                    No stock history found.

                                </td>

                            </tr>

                            @endforelse

                        </tbody>
                    </table>
                    {{ $stockHistories->links() }}

                </div>


                <!-- Footer -->
                <!-- <div class="d-flex justify-content-between align-items-center p-4 flex-wrap gap-3">

                    <div class="text-secondary">

                        Showing 1 to 8 of 42 stock records

                    </div> -->

                <!-- Pagination -->
                <!-- <nav>

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

        </div> -->

                <!-- Info Alert -->
                <div class="alert alert-primary mt-4 rounded-4 d-flex align-items-center">

                    <i class="bi bi-info-circle-fill me-3 fs-4"></i>

                    Stock history shows all quantity changes, including additions,
                    reductions, and manual adjustments.
                </div>

    </x-layout>
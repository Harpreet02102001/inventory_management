<x-layout title="Dashboard">

    <!-- Page Heading -->
    <div class="mb-4">

        <h2 class="fw-bold mb-1">Dasboard</h2>

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
                        <h3 class="fw-bold mb-0">{{ $totalProducts }}</h3>
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
                        <h3 class="fw-bold mb-0">{{$totalCategories}}</h3>
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
                        <h3 class="fw-bold mb-0">{{$totalSuppliers}}</h3>
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
                        <h3 class="fw-bold mb-0 text-warning">{{$lowStockCount}}</h3>
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
        <div class="col-lg-6">

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
                                <!-- <th>Category</th> -->
                                <th>Current Stock</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>

                        </thead>

                        <tbody>

                            @forelse ($lowStockProducts as $product)
                            <tr>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->sku }}</td>
                                <!-- <td>{{ $product->category?->name }}</td> -->
                                <td>{{ $product->stock_quantity }}</td>

                                <td>
                                    <span class="table-badge warning-badge">
                                        Low Stock
                                    </span>
                                </td>

                                <td>
                                    <a href="{{ route('product.show', $product->id) }}"
                                        class="btn btn-sm btn-outline-primary">
                                        View
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center py-4">
                                    No low stock products found.
                                </td>
                            </tr>
                            @endforelse

                        </tbody>

                    </table>

                </div>

                <div class="table-footer-link">
                    <a href="{{ route('stock.view') }}">
                        View all low stock products
                        <i class="bi bi-chevron-right"></i>
                    </a>
                </div>

            </div>

        </div>

        <!-- Recent Stock Updates -->
        <div class="col-lg-6">

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

                            @forelse ($recentStockUpdates as $history)

                            <tr>

                                <td>
                                    {{ $history->product?->name }}
                                </td>

                                <td>

                                    @if ($history->type === 'IN')

                                    <span class="table-badge success-badge">
                                        Added
                                    </span>

                                    @else

                                    <span class="table-badge danger-badge">
                                        Reduced
                                    </span>

                                    @endif

                                </td>

                                <td
                                    class="{{ $history->type === 'IN' ? 'text-success' : 'text-danger' }} fw-bold">

                                    {{ $history->type === 'IN' ? '+' : '-' }}
                                    {{ $history->quantity_changed }}

                                </td>

                                <td>
                                    {{ $history->user?->name }}
                                </td>

                                <td>
                                    {{ $history->created_at->format('h:i A') }}
                                </td>

                            </tr>

                            @empty

                            <tr>
                                <td colspan="5" class="text-center py-4">
                                    No stock updates found.
                                </td>
                            </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

                <div class="table-footer-link">
                    <a href="{{ route('stock') }}">
                        View all stock updates
                        <i class="bi bi-chevron-right"></i>
                    </a>
                </div>

            </div>

        </div>

    </div>

</x-layout>
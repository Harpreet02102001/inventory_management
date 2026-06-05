<x-layout title='products'>

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
        @can('create', App\Models\Product::class)
        <a href="{{ route('product.create') }}" class="btn btn-primary">
            Add Product
        </a>
        @endcan
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

                        Reset
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


                        @forelse($products as $product)

                        <tr>

                            <td class="ps-3">

                                <img src="{{ $product->image_url ? asset('storage/' . $product->image_url) : 'https://via.placeholder.com/45' }}"
                                    class="rounded border"
                                    width="45"
                                    height="45"
                                    style="object-fit:cover;">

                            </td>

                            <td class="fw-semibold">
                                {{ $product->name }}
                            </td>

                            <td>{{ $product->sku }}</td>

                            <td>{{ $product->category->name }}</td>

                            <td>{{ $product->supplier->name }}</td>

                            <td>${{ number_format($product->price, 2) }}</td>

                            <td>${{ number_format($product->selling_price, 2) }}</td>

                            <td>{{ $product->stock_quantity }}</td>

                            <td>

                                @if ($product->status == 1)
                                <span class="badge bg-success-subtle text-success">
                                    Active
                                </span>
                                @else
                                <span class="badge bg-secondary-subtle text-secondary">
                                    Inactive
                                </span>
                                @endif


                            </td>

                            <td class="pe-3">

                                <div class="d-flex justify-content-center gap-1 flex-wrap">
                                    <!-- view -->
                                    <a href="{{ route('product.show', $product) }}" class="btn btn-sm btn-light border">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <!-- edit -->
                                    @can('update', $product)
                                    <a href="{{ route('product.edit', $product) }}" class="btn btn-sm btn-light border">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    @endcan

                                    <!-- Delete Button trigger modal -->
                                    @can('delete', $product)
                                    <form action="{{ route('product.destroy', $product->id) }}"
                                        method="POST"
                                        onsubmit="return confirm('Delete this product?')">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                            class="btn btn-sm btn-outline-danger">
                                            <i class="bi bi-trash"></i>
                                        </button>

                                    </form>
                                    @endcan

                                    <!-- Delete Modal -->
                                    <!-- <div class="modal fade" id="deleteModal{{ $product->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $product->id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteModalLabel{{ $product->id }}">Confirm Deletion</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                    <button type="button" class="btn btn-danger">Delete</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->

                                    <!-- <button class="btn btn-sm btn-light border">
                                        <i class="bi bi-box"></i>
                                    </button> -->
                                    @empty

                        <tr>
                            <td colspan="7" class="text-center py-4">
                                No categories found.
                            </td>
                        </tr>

                        @endforelse

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
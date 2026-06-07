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

        <div class="card-body p-4">

            <form method="GET" action="{{ route('product') }}">

                <div class="row g-3 align-items-end">

                    <!-- Search -->
                    <div class="col-lg-3">

                        <label class="form-label fw-semibold">
                            Search
                        </label>

                        <div class="input-group">

                            <span class="input-group-text bg-white">
                                <i class="bi bi-search"></i>
                            </span>

                            <input type="text"
                                name="search"
                                value="{{ request('search') }}"
                                class="form-control"
                                placeholder="Product or SKU">

                        </div>

                    </div>

                    <!-- Category -->
                    <div class="col-lg-2">

                        <label class="form-label fw-semibold">
                            Category
                        </label>

                        <select name="category_id" class="form-select">
                            <option value="">All Categories</option>

                            @foreach($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ request('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                            @endforeach

                        </select>

                    </div>

                    <!-- Supplier -->
                    <div class="col-lg-2">

                        <label class="form-label fw-semibold">
                            Supplier
                        </label>

                        <select name="supplier_id" class="form-select">
                            <option value="">All Suppliers</option>

                            @foreach($suppliers as $supplier)
                            <option value="{{ $supplier->id }}"
                                {{ request('supplier_id') == $supplier->id ? 'selected' : '' }}>
                                {{ $supplier->name }}
                            </option>
                            @endforeach

                        </select>

                    </div>

                    <!-- Status -->
                    <div class="col-lg-2">

                        <label class="form-label fw-semibold">
                            Status
                        </label>

                        <select name="status" class="form-select">
                            <option value="">All Status</option>
                            <option value="1">Active</option>
                            <option value="2">Inactive</option>
                        </select>

                    </div>

                    <!-- Stock -->
                    <div class="col-lg-1">

                        <label class="form-label fw-semibold">
                            Stock
                        </label>

                        <select name="stock" class="form-select">
                            <option value="">All</option>
                            <option value="low">Low</option>
                        </select>

                    </div>

                    <!-- Buttons -->
                    <div class="col-lg-2">

                        <label class="form-label fw-semibold opacity-0">
                            Action
                        </label>

                        <div class="d-flex gap-2">

                            <button type="submit"
                                class="btn btn-primary flex-fill">

                                <i class="bi bi-funnel me-1"></i>
                                Search

                            </button>

                            <a href="{{ route('product') }}"
                                class="btn btn-outline-secondary">

                                <i class="bi bi-arrow-clockwise">Reset</i>

                            </a>

                        </div>

                    </div>

                </div>

            </form>

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



            </small>

            <!-- Pagination -->
            <nav>

                <ul class="pagination pagination-sm mb-0">

                    {{ $products->links() }}

                </ul>

            </nav>

        </div>

    </div>

    </div>

</x-layout>
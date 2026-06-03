<x-layout title="Update Stock">
    {{-- Page Header --}}
    <div class="mb-4">

        <h2 class="fw-bold mb-1">
            Low Stock Products
        </h2>

        <p class="text-muted mb-0">
            Products that need restocking
        </p>

    </div>

    {{-- Info Alert --}}
    <div class="alert alert-primary d-flex align-items-center shadow-sm">

        <i class="bi bi-info-circle-fill me-2"></i>

        Visible to Admin and Staff users for quick restocking.

    </div>

    {{-- Low Stock Table --}}
    <div class="card border-0 shadow-sm">

        <div class="card-body p-0">

            <div class="table-responsive">

                <table class="table table-hover align-middle mb-0">

                    <thead class="table-light">

                        <tr>

                            <th>Image</th>
                            <th>Product Name</th>
                            <th>SKU</th>
                            <th>Category</th>
                            <th>Supplier</th>
                            <th>Current Stock</th>
                            <th>Status</th>
                            <th>Action</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($products as $product)

                        <tr>

                            {{-- Product Image --}}
                            <td width="90">

                                <img src="{{ asset('storage/products/' . $product->image_url) }}"
                                    class="img-thumbnail"
                                    width="60">

                            </td>

                            {{-- Product Name --}}
                            <td class="fw-semibold">
                                {{ $product->name }}
                            </td>

                            {{-- SKU --}}
                            <td>
                                {{ $product->sku }}
                            </td>

                            {{-- Category --}}
                            <td>
                                {{ $product->category->name }}
                            </td>

                            {{-- Supplier --}}
                            <td>
                                {{ $product->supplier->name }}
                            </td>

                            {{-- Stock --}}
                            <td>

                                <span class="fw-bold text-danger">
                                    {{ $product->stock_quantity }}
                                </span>

                            </td>

                            {{-- Product Status --}}
                            <td>

                                @if($product->status)

                                <span class="badge bg-success">
                                    Active
                                </span>

                                @else

                                <span class="badge bg-secondary">
                                    Inactive
                                </span>

                                @endif

                                <br>

                                <span class="badge bg-warning text-dark mt-1">
                                    Low Stock
                                </span>

                            </td>

                            {{-- Action --}}
                            <td>

                                <a href="{{ route('product.show', $product->id) }}"
                                    class="btn btn-outline-primary btn-sm">

                                    <i class="bi bi-pencil-square me-1"></i>

                                    Update Stock

                                </a>

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="8"
                                class="text-center py-4">

                                No low stock products found.

                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

        {{-- Footer --}}
        <div class="card-footer bg-white">

            <div class="d-flex justify-content-between align-items-center flex-wrap">

                <small class="text-muted">

                    Showing {{ $products->count() }}
                    low stock products

                </small>

                {{ $products->links() }}

            </div>

        </div>

    </div>
</x-layout>
<x-layout title="Categories">

    <!-- Header -->
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">

        <div>
            <h2 class="fw-bold mb-1">Categories</h2>
            <p class="text-muted mb-0">
                View and manage product categories
            </p>
        </div>

        <a href="{{ route('categories.create') }}"
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
                        @forelse($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>

                            <td class="fw-semibold">
                                {{ $category->name }}
                            </td>

                            <td>
                                {{ $category->description }}
                            </td>

                            <td>
                                @if ($category->status == '1')
                                <span class="badge bg-success-subtle text-success">
                                    Active
                                </span>
                                @else
                                <span class="badge bg-secondary-subtle text-secondary">
                                    Inactive
                                </span>
                                @endif
                            </td>

                            <td>{{ $category->products_count }}</td>

                            <td>{{ $category->created_at->format('M d, Y') }}</td>

                            <td>
                                <div class="d-flex justify-content-center gap-1">

                                    @can('update', $category)
                                    <a href="{{ route('categories.edit', $category) }}"
                                        class="btn btn-sm btn-outline-warning">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    @endcan

                                    @can('delete', $category)
                                    <form action="{{ route('categories.destroy', $category->id) }}"
                                        method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this category?')">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                            class="btn btn-sm btn-outline-danger">
                                            <i class="bi bi-trash"></i>
                                        </button>

                                    </form>
                                    @endcan

                                </div>
                            </td>
                        </tr>


                        @empty

                        <tr>
                            <td colspan="7" class="text-center py-4">
                                No categories found.
                            </td>
                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>



        </div>

    </div>

</x-layout>
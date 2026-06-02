<x-layout title="Suppliers">
    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2 class="fw-bold mb-1">Suppliers</h2>
            <p class="text-muted mb-0">
                View and manage supplier records
            </p>
        </div>

        <a href="{{ route('supplier.create') }}"
            class="btn btn-primary">
            <i class="bi bi-plus-lg me-2"></i>
            Add Supplier
        </a>

    </div>

    <!-- Search Card -->
    <div class="card border-0 shadow-sm mb-4">

        <div class="card-body">

            <label class="form-label fw-semibold">
                Search
            </label>

            <div class="row g-3">

                <div class="col-md-10">

                    <div class="input-group">

                        <span class="input-group-text bg-white">
                            <i class="bi bi-search"></i>
                        </span>

                        <input type="text"
                            class="form-control"
                            placeholder="Search by supplier name, email, phone, or company name">

                    </div>

                </div>

                <div class="col-md-2">

                    <button class="btn btn-outline-secondary w-100">

                        <i class="bi bi-arrow-counterclockwise me-2"></i>
                        Reset

                    </button>

                </div>

            </div>

        </div>

    </div>

    <!-- Suppliers Table -->
    <div class="card border-0 shadow-sm">

        <div class="card-body p-0">

            <div class="table-responsive">

                <table class="table table-hover align-middle mb-0">

                    <thead class="table-light">

                        <tr>

                            <th>#</th>
                            <th>Name</th>
                            <th>Company Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Products Count</th>
                            <th>Created Date</th>
                            <th class="text-center">Actions</th>
                        </tr>

                    </thead>

                    <tbody>

                        @forelse($suppliers as $supplier)

                        <tr>

                            <td>{{ $loop->iteration }}</td>

                            <td class="fw-semibold">
                                {{ $supplier->name }}
                            </td>

                            <td class="fw-semibold">
                                {{ $supplier->company }}
                            </td>

                            <td>
                                <a href="mailto:{{ $supplier->email }}"
                                    class="text-decoration-none">
                                    {{ $supplier->email }}
                                </a>
                            </td>

                            <td>
                                {{ $supplier->phone }}
                            </td>

                            <td>
                                {{ $supplier->products_count ?? 0 }}
                            </td>

                            <td>
                                {{ $supplier->created_at->format('M d, Y') }}
                            </td>

                            <td>

                                <div class="d-flex justify-content-center gap-2">

                                    <!-- View -->
                                    <a href="{{ route('supplier.show', $supplier->id) }}"
                                        class="btn btn-sm btn-outline-primary">
                                        <i class="bi bi-eye"></i>
                                    </a>

                                    <!-- Edit -->
                                    <a href="{{ route('supplier.edit', $supplier->id) }}"
                                        class="btn btn-sm btn-outline-warning">
                                        <i class="bi bi-pencil"></i>
                                    </a>

                                    <!-- Delete -->
                                    <form action="{{ route('supplier.destroy', $supplier->id) }}"
                                        method="POST"
                                        onsubmit="return confirm('Delete this supplier?')">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                            class="btn btn-sm btn-outline-danger">
                                            <i class="bi bi-trash"></i>
                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="8"
                                class="text-center py-4">

                                No suppliers found.

                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

            <!-- Footer -->
            <div class="d-flex justify-content-between align-items-center p-3">



            </div>

        </div>

    </div>
</x-layout>
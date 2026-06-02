<x-layout title="Edit Supplier">

    <!-- Header -->
    <div class="mb-4">

        <h2 class="fw-bold mb-1">
            Edit Supplier
        </h2>

        <p class="text-muted">
            Update supplier information
        </p>

    </div>

    <!-- Supplier Summary -->
    <div class="card border-0 shadow-sm mb-4">

        <div class="card-body">

            <div class="d-flex align-items-center gap-4">

                <div class="rounded-circle bg-primary bg-opacity-10 d-flex align-items-center justify-content-center"
                    style="width: 80px; height: 80px;">

                    <i class="bi bi-box-seam text-primary fs-1"></i>

                </div>

                <div>

                    <h5 class="fw-semibold mb-1">
                        Linked Products
                    </h5>

                    <h1 class="text-primary fw-bold mb-1">
                        {{ $supplier->products_count ?? 0 }}
                    </h1>

                    <p class="text-muted mb-0">
                        Products associated with this supplier
                    </p>

                </div>

            </div>

            <div class="alert alert-light border mt-4 mb-0">

                <i class="bi bi-info-circle text-primary me-2"></i>

                Updating supplier details will keep linked products unchanged.

            </div>

        </div>

    </div>

    <!-- Edit Form -->
    <div class="card border-0 shadow-sm">

        <div class="card-body p-4">

            <form action="{{ route('supplier.update', $supplier->id) }}"
                method="POST">

                @csrf
                @method('PUT')

                <!-- Name -->
                <div class="mb-4">

                    <label class="form-label fw-semibold">
                        Name <span class="text-danger">*</span>
                    </label>

                    <div class="input-group">

                        <span class="input-group-text">
                            <i class="bi bi-person"></i>
                        </span>

                        <input type="text"
                            name="name"
                            value="{{ old('name', $supplier->name) }}"
                            class="form-control @error('name') is-invalid @enderror">

                    </div>

                    @error('name')
                    <div class="text-danger small mt-1">
                        {{ $message }}
                    </div>
                    @enderror

                </div>

                <!-- Email -->
                <div class="mb-4">

                    <label class="form-label fw-semibold">
                        Email <span class="text-danger">*</span>
                    </label>

                    <div class="input-group">

                        <span class="input-group-text">
                            <i class="bi bi-envelope"></i>
                        </span>

                        <input type="email"
                            name="email"
                            value="{{ old('email', $supplier->email) }}"
                            class="form-control @error('email') is-invalid @enderror">

                    </div>

                    @error('email')
                    <div class="text-danger small mt-1">
                        {{ $message }}
                    </div>
                    @enderror

                </div>

                <!-- Phone -->
                <div class="mb-4">

                    <label class="form-label fw-semibold">
                        Phone <span class="text-danger">*</span>
                    </label>

                    <div class="input-group">

                        <span class="input-group-text">
                            <i class="bi bi-telephone"></i>
                        </span>

                        <input type="text"
                            name="phone"
                            value="{{ old('phone', $supplier->phone) }}"
                            class="form-control @error('phone') is-invalid @enderror">

                    </div>

                    @error('phone')
                    <div class="text-danger small mt-1">
                        {{ $message }}
                    </div>
                    @enderror

                </div>

                <!-- Company -->
                <div class="mb-4">

                    <label class="form-label fw-semibold">
                        Company Name <span class="text-danger">*</span>
                    </label>

                    <div class="input-group">

                        <span class="input-group-text">
                            <i class="bi bi-building"></i>
                        </span>

                        <input type="text"
                            name="company"
                            value="{{ old('company', $supplier->company) }}"
                            class="form-control @error('company') is-invalid @enderror">

                    </div>

                    @error('company')
                    <div class="text-danger small mt-1">
                        {{ $message }}
                    </div>
                    @enderror

                </div>

                <!-- Address -->
                <div class="mb-4">

                    <label class="form-label fw-semibold">
                        Address
                    </label>

                    <div class="input-group">

                        <span class="input-group-text">
                            <i class="bi bi-geo-alt"></i>
                        </span>

                        <textarea
                            name="address"
                            rows="3"
                            class="form-control @error('address') is-invalid @enderror">{{ old('address', $supplier->address) }}</textarea>

                    </div>

                    @error('address')
                    <div class="text-danger small mt-1">
                        {{ $message }}
                    </div>
                    @enderror

                </div>

                <!-- Buttons -->
                <div class="d-flex gap-3">

                    <button type="submit"
                        class="btn btn-primary">

                        <i class="bi bi-floppy me-2"></i>
                        Update Supplier

                    </button>

                    <a href="{{ route('supplier') }}"
                        class="btn btn-outline-secondary">
                        Cancel
                    </a>

                </div>

            </form>

        </div>

    </div>

</x-layout>
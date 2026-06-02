<x-layout title="Add Category">

    <!-- Page Header -->
    <div class="mb-4">

        <h2 class="fw-bold mb-1">
            Add Category
        </h2>

        <p class="text-muted mb-0">
            Create a new product category
        </p>

    </div>

    <!-- Form Card -->
    <div class="row">
        <div class="col-lg-6 card shadow-sm border-0">

            <div class="card-body p-4">

                <form action="{{ route('categories.store') }}"
                    method="POST">
                    @csrf

                    <!-- Name -->
                    <div class="mb-3">

                        <label class="form-label fw-semibold">
                            Name <span class="text-danger">*</span>
                        </label>

                        <input type="text"
                            name="name"
                            value="{{ old('name') }}"
                            class="form-control @error('name') is-invalid @enderror"
                            placeholder="Enter category name">

                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror

                    </div>

                    <!-- Description -->
                    <div class="mb-3">

                        <label class="form-label fw-semibold">
                            Description
                        </label>

                        <textarea
                            name="description"
                            rows="4"
                            class="form-control"
                            placeholder="Enter category description">{{ old('description') }}</textarea>

                        <small class="text-muted">
                            Provide a short description for this category.
                        </small>

                    </div>

                    <!-- Status -->
                    <div class="mb-4">

                        <label class="form-label fw-semibold">
                            Status <span class="text-danger">*</span>
                        </label>

                        <select
                            name="status"
                            class="form-select @error('status') is-invalid @enderror">

                            <option value="">
                                Select Status
                            </option>

                            <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>
                                Active
                            </option>

                            <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>
                                Inactive
                            </option>

                        </select>

                        @error('status')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror

                    </div>

                    <!-- Buttons -->
                    <div class="d-flex gap-2">

                        <button type="submit"
                            class="btn btn-primary">

                            <i class="bi bi-floppy me-1"></i>

                            Save Category

                        </button>

                        <a href="{{ route('categories') }}"
                            class="btn btn-outline-secondary">

                            Cancel

                        </a>

                    </div>

                </form>

            </div>

        </div>

    </div>
</x-layout>
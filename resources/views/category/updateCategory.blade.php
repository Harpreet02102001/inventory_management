<x-layout title="Edit Category">

    <!-- Page Header -->
    <div class="mb-4">

        <h2 class="fw-bold mb-1">
            Edit Category
        </h2>

        <p class="text-secondary fs-5">
            Update category information
        </p>

    </div>

    <form action="{{ route('categories.update', $category->id) }}" method="POST">

        @csrf
        @method('PUT')

        <!-- Basic Information -->
        <div class="card border-0 shadow-sm rounded-4 mb-4">

            <div class="card-body p-4">

                <h4 class="fw-bold mb-4 d-flex align-items-center gap-2">

                    <i class="bi bi-bookmark-check-fill text-primary"></i>

                    Basic Information

                </h4>

                <div class="row g-4">

                    <!-- Category Name -->
                    <div class="col-lg-6">

                        <label class="form-label fw-semibold">
                            Category Name
                            <span class="text-danger">*</span>
                        </label>

                        <input type="text"
                            class="form-control form-control-lg"
                            value="{{ $category->name }}"
                            name="name"
                            placeholder="Enter category name">
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Status -->
                    <div class="col-lg-6">

                        <label class="form-label fw-semibold">
                            Status
                            <span class="text-danger">*</span>
                        </label>

                        <select class="form-select form-select-lg" name="status">

                            <option value="1" {{ $category->status == '1' ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ $category->status == '0' ? 'selected' : '' }}>Inactive</option>

                        </select>

                    </div>

                    <!-- Description -->
                    <div class="col-lg-12">

                        <label class="form-label fw-semibold">
                            Description
                        </label>

                        <textarea class="form-control"
                            rows="4"
                            name="description"
                            placeholder="Enter category description">{{ $category->description }}</textarea>


                        <small class="text-secondary">
                            Optional: Add a brief description of this category.
                        </small>

                    </div>

                </div>

            </div>

        </div>

        <!-- Buttons -->
        <div class="d-flex gap-3">

            <button type="submit"
                class="btn btn-primary btn-lg px-4">

                <i class="bi bi-floppy me-2"></i>

                Update Category

            </button>

            <a href="{{ route('categories')}}"
                class="btn btn-light border btn-lg px-4">

                Cancel

            </a>

        </div>

    </form>

</x-layout>
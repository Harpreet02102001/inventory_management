<x-layout title="Add Category">

    <!-- Page Header -->
    <div class="mb-4">

        <h2 class="fw-bolds mb-1">
            Add Category
        </h2>

        <p class="text-secondary fs-5">
            Create a new product category
        </p>

    </div>

    <form action="#" method="POST">

        @csrf

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
                            placeholder="Enter category name">

                    </div>

                    <!-- Status -->
                    <div class="col-lg-6">

                        <label class="form-label fw-semibold">
                            Status
                            <span class="text-danger">*</span>
                        </label>

                        <select class="form-select form-select-lg">

                            <option>Active</option>
                            <option>Inactive</option>

                        </select>

                    </div>

                    <!-- Description -->
                    <div class="col-lg-12">

                        <label class="form-label fw-semibold">
                            Description
                        </label>

                        <textarea class="form-control"
                            rows="4"
                            placeholder="Enter category description"></textarea>

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

                Save Category

            </button>

            <button type="button"
                class="btn btn-light border btn-lg px-4">

                Cancel

            </button>

        </div>

    </form>

</x-layout>
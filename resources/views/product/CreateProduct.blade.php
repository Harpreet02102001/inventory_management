<x-layout title="Add Product">

    <!-- Page Header -->
    <div class="mb-4">

        <h1 class="fw-bold display-6 mb-1">
            Add Product
        </h1>

        <p class="text-secondary fs-5">
            Create a new inventory product
        </p>

    </div>

    <form action="#" method="POST" enctype="multipart/form-data">

        @csrf

        <!-- Basic Information -->
        <div class="card border-0 shadow-sm rounded-4 mb-4">

            <div class="card-body p-4">

                <h4 class="fw-bold mb-4 d-flex align-items-center gap-2">

                    <i class="bi bi-bookmark-check-fill text-primary"></i>

                    Basic Information

                </h4>

                <div class="row g-4">

                    <!-- Product Name -->
                    <div class="col-lg-6">

                        <label class="form-label fw-semibold">
                            Product Name
                            <span class="text-danger">*</span>
                        </label>

                        <input type="text"
                            class="form-control form-control-lg"
                            placeholder="Enter product name">

                    </div>

                    <!-- SKU -->
                    <div class="col-lg-6">

                        <label class="form-label fw-semibold">
                            SKU
                            <span class="text-danger">*</span>
                        </label>

                        <input type="text"
                            class="form-control form-control-lg"
                            placeholder="Enter SKU (e.g. WM-001)">

                    </div>

                    <!-- Category -->
                    <div class="col-lg-6">

                        <label class="form-label fw-semibold">
                            Category
                            <span class="text-danger">*</span>
                        </label>

                        <select class="form-select form-select-lg">

                            <option>Electronics</option>
                            <option>Furniture</option>
                            <option>Accessories</option>

                        </select>

                        <small class="text-secondary">
                            Only active categories are shown.
                        </small>

                    </div>

                    <!-- Supplier -->
                    <div class="col-lg-6">

                        <label class="form-label fw-semibold">
                            Supplier
                            <span class="text-danger">*</span>
                        </label>

                        <select class="form-select form-select-lg">

                            <option>TechSource Ltd.</option>
                            <option>ABC Supplier</option>

                        </select>

                        <small class="text-secondary">
                            Select from available suppliers.
                        </small>

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

                </div>

            </div>

        </div>

        <!-- Pricing -->
        <div class="card border-0 shadow-sm rounded-4 mb-4">

            <div class="card-body p-4">

                <h4 class="fw-bold mb-4 d-flex align-items-center gap-2">

                    <i class="bi bi-tags-fill text-primary"></i>

                    Pricing

                </h4>

                <div class="row g-4">

                    <!-- Purchase Price -->
                    <div class="col-lg-6">

                        <label class="form-label fw-semibold">
                            Purchase Price
                            <span class="text-danger">*</span>
                        </label>

                        <input type="number"
                            class="form-control form-control-lg"
                            placeholder="0.00">

                        <small class="text-secondary">
                            Enter the product purchase price.
                        </small>

                    </div>

                    <!-- Selling Price -->
                    <div class="col-lg-6">

                        <label class="form-label fw-semibold">
                            Selling Price
                            <span class="text-danger">*</span>
                        </label>

                        <input type="number"
                            class="form-control form-control-lg"
                            placeholder="0.00">

                        <small class="text-secondary">
                            Enter the product selling price.
                        </small>

                    </div>

                </div>

            </div>

        </div>

        <!-- Stock & Image -->
        <div class="card border-0 shadow-sm rounded-4 mb-4">

            <div class="card-body p-4">

                <div class="d-flex justify-content-between align-items-center mb-4">

                    <h4 class="fw-bold d-flex align-items-center gap-2 mb-0">

                        <i class="bi bi-box-seam-fill text-primary"></i>

                        Stock and Image

                    </h4>

                    <span class="badge bg-primary-subtle text-primary px-3 py-2 rounded-pill">

                        <i class="bi bi-info-circle-fill me-1"></i>

                        Image preview enabled

                    </span>

                </div>

                <div class="row g-4">

                    <!-- Stock Quantity -->
                    <div class="col-lg-4">

                        <label class="form-label fw-semibold">
                            Stock Quantity
                            <span class="text-danger">*</span>
                        </label>

                        <input type="number"
                            class="form-control form-control-lg"
                            placeholder="0">

                        <small class="text-secondary">
                            Enter the initial stock quantity.
                        </small>

                    </div>

                    <!-- Upload -->
                    <div class="col-lg-5">

                        <label class="form-label fw-semibold">
                            Product Image
                            <span class="text-danger">*</span>
                        </label>

                        <div class="border border-2 border-primary border-opacity-25 rounded-4 p-5 text-center bg-light">

                            <i class="bi bi-cloud-arrow-up text-primary display-5"></i>

                            <p class="fw-semibold mt-3 mb-1">

                                Drag & drop product image or
                                <span class="text-primary">
                                    browse
                                </span>

                            </p>

                            <small class="text-secondary d-block">
                                Supports: JPG, PNG, WEBP
                            </small>

                            <small class="text-secondary">
                                Max file size: 2MB
                            </small>

                            <input type="file"
                                class="form-control mt-3">

                        </div>

                    </div>

                    <!-- Preview -->
                    <div class="col-lg-3">

                        <div class="card border rounded-4 overflow-hidden">

                            <div class="position-relative">

                                <img src="https://images.unsplash.com/photo-1527814050087-3793815479db?q=80&w=600"
                                    class="img-fluid"
                                    alt="Product Image">

                                <button type="button"
                                    class="btn btn-sm btn-danger position-absolute top-0 end-0 m-2 rounded-circle">

                                    <i class="bi bi-x"></i>

                                </button>

                            </div>

                            <div class="card-body">

                                <h6 class="mb-1">
                                    wireless-mouse.jpg
                                </h6>

                                <small class="text-secondary">
                                    156 KB
                                </small>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <!-- Buttons -->
        <div class="d-flex gap-3">

            <button type="submit"
                class="btn btn-primary btn-lg px-4">

                <i class="bi bi-floppy me-2"></i>

                Save Product

            </button>

            <button type="button"
                class="btn btn-light border btn-lg px-4">

                Cancel

            </button>

        </div>

    </form>

</x-layout>
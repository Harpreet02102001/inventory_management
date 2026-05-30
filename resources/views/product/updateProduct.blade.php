<x-layout title="Update Stock">

    <!-- Page Header -->
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">

        <div>

            <h2 class="fw-bold mb-1">
                Update Stock
            </h2>

            <p class="text-secondary mb-0">
                Manage inventory stock quantity
            </p>

        </div>

        <a href="{{route('product')}}"
            class="btn btn-outline-secondary">

            <i class="bi bi-arrow-left me-1"></i>

            Back

        </a>

    </div>

    <!-- Product Summary -->
    <div class="card border-0 shadow-sm rounded-4 mb-4">

        <div class="card-body p-3 p-md-4">

            <div class="d-flex justify-content-between align-items-center mb-4">

                <h5 class="fw-bold mb-0">
                    Product Summary
                </h5>

                <span class="badge bg-success-subtle text-success px-3 py-2 rounded-pill">

                    Active

                </span>

            </div>

            <div class="row align-items-center g-4">

                <!-- Product Image -->
                <div class="col-md-3 col-lg-2">

                    <img src="https://images.unsplash.com/photo-1527814050087-3793815479db?q=80&w=400"
                        class="img-fluid rounded-4 border"
                        alt="Product">

                </div>

                <!-- Product Details -->
                <div class="col-md-6 col-lg-7">

                    <div class="row g-3">

                        <div class="col-sm-6">

                            <small class="text-secondary d-block">
                                Product Name
                            </small>

                            <div class="fw-semibold">
                                Wireless Mouse
                            </div>

                        </div>

                        <div class="col-sm-6">

                            <small class="text-secondary d-block">
                                SKU
                            </small>

                            <div class="fw-semibold">
                                WM-001
                            </div>

                        </div>

                        <div class="col-sm-6">

                            <small class="text-secondary d-block">
                                Category
                            </small>

                            <div class="fw-semibold">
                                Accessories
                            </div>

                        </div>

                        <div class="col-sm-6">

                            <small class="text-secondary d-block">
                                Supplier
                            </small>

                            <div class="fw-semibold">
                                TechSource Ltd.
                            </div>

                        </div>

                    </div>

                </div>

                <!-- Stock -->
                <div class="col-md-3 col-lg-3">

                    <div class="border rounded-4 text-center p-3">

                        <small class="text-secondary d-block mb-1">
                            Current Stock
                        </small>

                        <h2 class="fw-bold text-primary mb-0">
                            45
                        </h2>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- Update Form -->
    <div class="card border-0 shadow-sm rounded-4">

        <div class="card-body p-3 p-md-4">

            <h5 class="fw-bold mb-4">
                Stock Update
            </h5>

            <form>

                <div class="row g-3">

                    <!-- Change Type -->
                    <div class="col-md-4">

                        <label class="form-label fw-semibold small">
                            Change Type
                        </label>

                        <select class="form-select">

                            <option>Add</option>
                            <option selected>Reduce</option>

                        </select>

                    </div>

                    <!-- Quantity -->
                    <div class="col-md-4">

                        <label class="form-label fw-semibold small">
                            Quantity
                        </label>

                        <input type="number"
                            class="form-control border-danger"
                            value="50">

                        <small class="text-danger d-block mt-1">

                            Invalid quantity for reduce stock.

                        </small>

                    </div>

                    <!-- Remarks -->
                    <div class="col-md-4">

                        <label class="form-label fw-semibold small">
                            Remarks
                        </label>

                        <textarea class="form-control"
                            rows="1"
                            placeholder="Optional remarks"></textarea>

                    </div>

                </div>

                <!-- Warning -->
                <div class="alert alert-warning py-2 px-3 mt-4 mb-4 rounded-3">

                    <small>

                        <i class="bi bi-exclamation-triangle-fill me-2"></i>

                        Reducing stock affects inventory immediately.

                    </small>

                </div>

                <!-- Buttons -->
                <div class="d-flex flex-wrap gap-2">

                    <button type="submit"
                        class="btn btn-primary">

                        <i class="bi bi-floppy me-1"></i>

                        Update Stock

                    </button>

                    <button type="button"
                        class="btn btn-light border">

                        Cancel

                    </button>

                </div>

            </form>

        </div>

    </div>

</x-layout>
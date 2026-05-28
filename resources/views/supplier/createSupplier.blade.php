<x-layout title="Add Supplier">

    <!-- Header -->
    <div class="mb-4">

        <h1 class="fw-bold display-5 mb-1">
            Add Supplier
        </h1>

        <p class="text-secondary fs-5">
            Create a new supplier record
        </p>

    </div>

    <!-- Form Card -->
    <div class="row">
        <div class="col-lg-4 card border-0 shadow-sm rounded-4">

            <div class="card-body p-4">

                <form action="#" method="POST">

                    @csrf

                    <!-- Name -->
                    <div class="mb-4">

                        <label class="form-label fw-semibold">
                            Name <span class="text-danger">*</span>
                        </label>

                        <input type="text"
                            class="form-control form-control-lg"
                            placeholder="Enter supplier name">

                    </div>

                    <!-- Email -->
                    <div class="mb-4">

                        <label class="form-label fw-semibold">
                            Email <span class="text-danger">*</span>
                        </label>

                        <div class="input-group input-group-lg">

                            <span class="input-group-text bg-white">
                                <i class="bi bi-envelope"></i>
                            </span>

                            <input type="email"
                                class="form-control"
                                placeholder="Enter supplier email">

                        </div>

                        <div class="text-danger mt-2 small">

                            <i class="bi bi-exclamation-triangle me-1"></i>

                            Please enter a valid email address.

                        </div>

                    </div>

                    <!-- Phone -->
                    <div class="mb-4">

                        <label class="form-label fw-semibold">
                            Phone <span class="text-danger">*</span>
                        </label>

                        <div class="input-group input-group-lg">

                            <span class="input-group-text bg-white">
                                <i class="bi bi-telephone"></i>
                            </span>

                            <input type="text"
                                class="form-control"
                                placeholder="Enter phone number">

                        </div>

                    </div>

                    <!-- Company -->
                    <div class="mb-4">

                        <label class="form-label fw-semibold">
                            Company Name
                        </label>

                        <div class="input-group input-group-lg">

                            <span class="input-group-text bg-white">
                                <i class="bi bi-building"></i>
                            </span>

                            <input type="text"
                                class="form-control"
                                placeholder="Enter company name">

                        </div>

                    </div>

                    <!-- Address -->
                    <div class="mb-4">

                        <label class="form-label fw-semibold">
                            Address
                        </label>

                        <textarea class="form-control form-control-lg"
                            rows="4"
                            placeholder="Enter supplier address"></textarea>

                    </div>

                    <!-- Buttons -->
                    <div class="d-flex gap-3">

                        <button class="btn btn-primary btn-lg px-4">

                            <i class="bi bi-floppy me-2"></i>

                            Save Supplier

                        </button>

                        <button type="button"
                            class="btn btn-light btn-lg border px-4">

                            Cancel

                        </button>

                    </div>

                </form>

            </div>

        </div>
    </div>

</x-layout>
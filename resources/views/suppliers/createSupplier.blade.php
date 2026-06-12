<x-layout title="Add Supplier">

    <!-- Header -->
    <div class="mb-4">

        <h2 class="fw-bold mb-1">
            Add Supplier
        </h2>

        <p class="text-secondary fs-5">
            Create a new supplier record
        </p>

    </div>

    <!-- Form Card -->
    <div class="row">
        <div class="col-lg-4 card border-0 shadow-sm rounded-4">

            <div class="card-body p-4">

                <form action="{{route('supplier.store')}}" method="POST">

                    @csrf
                    <!-- Name -->
                    <div class="mb-4">
                        <label class="form-label fw-semibold">
                            Name <span class="text-danger">*</span>
                        </label>

                        <input type="text"
                            name="name"
                            value="{{ old('name') }}"
                            class="form-control form-control-lg @error('name') is-invalid @enderror"
                            placeholder="Enter supplier name">

                        @error('name')
                        <div class="text-danger mt-2 small">
                            <i class="bi bi-exclamation-triangle me-1"></i>
                            {{ $message }}
                        </div>
                        @enderror
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
                                name="email"
                                value="{{ old('email') }}"
                                class="form-control @error('email') is-invalid @enderror"
                                placeholder="Enter supplier email">
                        </div>

                        @error('email')
                        <div class="text-danger mt-2 small">
                            <i class="bi bi-exclamation-triangle me-1"></i>
                            {{ $message }}
                        </div>
                        @enderror
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
                                name="phone"
                                value="{{ old('phone') }}"
                                class="form-control @error('phone') is-invalid @enderror"
                                placeholder="Enter phone number">
                        </div>

                        @error('phone')
                        <div class="text-danger mt-2 small">
                            <i class="bi bi-exclamation-triangle me-1"></i>
                            {{ $message }}
                        </div>
                        @enderror
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
                                name="company"
                                value="{{ old('company') }}"
                                class="form-control @error('company') is-invalid @enderror"
                                placeholder="Enter company name">
                        </div>

                        @error('company')
                        <div class="text-danger mt-2 small">
                            <i class="bi bi-exclamation-triangle me-1"></i>
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <!-- Address -->
                    <div class="mb-4">
                        <label class="form-label fw-semibold">
                            Address
                        </label>

                        <textarea
                            name="address"
                            rows="4"
                            class="form-control form-control-lg @error('address') is-invalid @enderror"
                            placeholder="Enter supplier address">{{ old('address') }}</textarea>

                        @error('address')
                        <div class="text-danger mt-2 small">
                            <i class="bi bi-exclamation-triangle me-1"></i>
                            {{ $message }}
                        </div>
                        @enderror
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
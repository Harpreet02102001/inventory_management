<x-layout>
    <div class="container-fluid">

        <div class="card border-0 shadow-sm rounded-4">

            <div class="card-header bg-white py-3">
                <h4 class="mb-0 fw-bold">
                    Create User
                </h4>
            </div>

            <div class="card-body p-4">

                <form action="{{ route('user.store') }}" method="POST">

                    @csrf

                    <div class="row g-4">

                        <!-- Name -->
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">
                                Full Name
                            </label>

                            <input type="text"
                                name="name"
                                value="{{ old('name') }}"
                                class="form-control @error('name') is-invalid @enderror"
                                placeholder="Enter Full Name">

                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">
                                Email Address
                            </label>

                            <input type="email"
                                name="email"
                                value="{{ old('email') }}"
                                class="form-control @error('email') is-invalid @enderror"
                                placeholder="Enter Email Address">

                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <!-- Role -->
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">
                                Role
                            </label>

                            <select name="role_id"
                                class="form-select @error('role_id') is-invalid @enderror">

                                <option value="">
                                    Select Role
                                </option>

                                @foreach ($roles as $role)
                                <option value="{{ $role->id }}"
                                    {{ old('role_id') == $role->id ? 'selected' : '' }}>
                                    {{ $role->name }}
                                </option>
                                @endforeach

                            </select>

                            @error('role_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <!-- Status -->
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">
                                Status
                            </label>

                            <select name="is_active"
                                class="form-select @error('is_active') is-invalid @enderror">

                                <option value="1" {{ old('is_active') == 1 ? 'selected' : '' }}>
                                    Active
                                </option>

                                <option value="0" {{ old('is_active') == 0 ? 'selected' : '' }}>
                                    Inactive
                                </option>

                            </select>

                            @error('is_active')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">
                                Password
                            </label>

                            <input type="password"
                                name="password"
                                class="form-control @error('password') is-invalid @enderror"
                                placeholder="Enter Password">

                            @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <!-- Confirm Password -->
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">
                                Confirm Password
                            </label>

                            <input type="password"
                                name="password_confirmation"
                                class="form-control"
                                placeholder="Confirm Password">
                        </div>

                    </div>

                    <div class="d-flex justify-content-end gap-2 mt-4">

                        <a href="{{ route('user.index') }}"
                            class="btn btn-light border">
                            Cancel
                        </a>

                        <button type="submit"
                            class="btn btn-primary">
                            Create User
                        </button>

                    </div>

                </form>

            </div>

        </div>
    </div>
</x-layout>
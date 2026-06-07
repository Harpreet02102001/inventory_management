<x-layout>
    <div class="container-fluid">

        <!-- Page Header -->
        <div class="mb-4">
            <h2 class="fw-bold mb-1">Profile</h2>
            <p class="text-muted">
                View and update your account information
            </p>
        </div>

        <div class="row g-4">

            <!-- Profile Form -->
            <div class="col-lg-8">

                <div class="card border-0 shadow-sm h-100">

                    <div class="card-header bg-white py-3">
                        <h5 class="mb-0">
                            <i class="bi bi-person me-2 text-primary"></i>
                            Profile Details
                        </h5>
                    </div>

                    <div class="card-body">

                        <form action="{{route('profile.update')}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">

                                <div class="col-md-4 text-center">

                                    <img src="https://ui-avatars.com/api/?name=Admin+User&background=0d6efd&color=fff"
                                        class="rounded-circle img-fluid mb-3"
                                        width="140">

                                    <span class="badge bg-success px-3 py-2">
                                        Active
                                    </span>

                                    <div class="mt-4 text-start">

                                        <p class="mb-1">
                                            <strong>Role:</strong>
                                            {{ $user->role->name}}
                                        </p>

                                        <p class="mb-0">
                                            <strong>Member Since:</strong>
                                            {{ $user->last_login_at}}
                                        </p>

                                    </div>

                                </div>

                                <div class="col-md-8">

                                    <div class="mb-3">

                                        <label class="form-label fw-semibold">
                                            Name
                                        </label>

                                        <input type="text"
                                            name="name"
                                            class="form-control"
                                            value="{{ $user->name }}">

                                    </div>

                                    <div class="mb-4">

                                        <label class="form-label fw-semibold">
                                            Email
                                        </label>

                                        <input type="email"
                                            name="email"
                                            class="form-control"
                                            value="{{ $user->email }}">

                                        <small class="text-muted">
                                            This email is used for system notifications.
                                        </small>

                                    </div>

                                    <div class="d-flex gap-2">

                                        <button class="btn btn-primary">

                                            <i class="bi bi-floppy me-1"></i>

                                            Update Profile

                                        </button>

                                        <button type="reset"
                                            class="btn btn-outline-secondary">

                                            Cancel

                                        </button>

                                    </div>

                                </div>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

            <!-- Account Summary -->
            <div class="col-lg-4">

                <div class="card border-0 shadow-sm">

                    <div class="card-header bg-white py-3">

                        <h5 class="mb-0">
                            <i class="bi bi-shield-check me-2 text-primary"></i>
                            Account Summary
                        </h5>

                    </div>

                    <div class="card-body">

                        <div class="d-flex justify-content-between py-2">
                            <span>Name</span>
                            <span class="badge bg-success">
                                {{$user->name}}
                            </span>
                        </div>

                        <hr>

                        <div class="d-flex justify-content-between py-2">
                            <span>Role</span>
                            <span>{{ $user->role->name}}</span>
                        </div>

                        <hr>

                        <div class="d-flex justify-content-between py-2">
                            <span>Email</span>
                            <span>{{$user->email}}</span>
                        </div>

                        <hr>

                        <div class="d-flex justify-content-between py-2">
                            <span>Member Since</span>
                            <span> <span>{{$user->created_at->format('M d, Y')}}</span></span>
                        </div>

                        <hr>

                        <div class="d-flex justify-content-between py-2">
                            <span>Last Login</span>
                            <span>{{$user->last_login_at}}</span>
                        </div>

                        <div class="alert alert-primary mt-4 mb-0">

                            <i class="bi bi-info-circle me-2"></i>

                            Keep your profile information up to date.

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <!-- Change Password -->
        <div class="card border-0 shadow-sm mt-4">

            <div class="card-header bg-white py-3">

                <h5 class="mb-0">
                    <i class="bi bi-lock me-2 text-primary"></i>
                    Change Password
                </h5>

            </div>

            <div class="card-body">

                <form action="{{ route('profile.password') }}" method="POST">

                    @csrf
                    @method('PUT')

                    <div class="row g-3">

                        <!-- Current Password -->
                        <div class="col-md-4">

                            <label class="form-label fw-semibold">
                                Current Password
                            </label>

                            <input type="password"
                                name="current_password"
                                class="form-control @error('current_password') is-invalid @enderror">

                            @error('current_password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror

                        </div>

                        <!-- New Password -->
                        <div class="col-md-4">

                            <label class="form-label fw-semibold">
                                New Password
                            </label>

                            <input type="password"
                                name="password"
                                class="form-control @error('password') is-invalid @enderror">

                            @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror

                        </div>

                        <!-- Confirm Password -->
                        <div class="col-md-4">

                            <label class="form-label fw-semibold">
                                Confirm Password
                            </label>

                            <input type="password"
                                name="password_confirmation"
                                class="form-control @error('password_confirmation') is-invalid @enderror">

                            @error('password_confirmation')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror

                        </div>

                    </div>

                    <div class="mt-4">

                        <button type="submit" class="btn btn-primary">

                            <i class="bi bi-lock me-1"></i>

                            Change Password

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>
</x-layout>
<nav class="navbar navbar-expand-lg bg-white border-bottom px-4 py-1">

    <div class="container-fluid">

        <div class="d-flex align-items-center gap-3">

            <button class="btn border-0 fs-4">
                <i class="bi bi-list"></i>
            </button>

            <h4 class="mb-0 fw-bold text-primary">
                Mini Inventory System
            </h4>

        </div>

        <div class="d-flex align-items-center gap-4">

            <div class="dropdown">

                <a class="dropdown-toggle text-decoration-none text-dark fw-semibold"
                    href="#"
                    role="button"
                    data-bs-toggle="dropdown">

                    <i class="bi bi-person-circle fs-4"></i>
                    @auth
                    {{ auth()->user()->name }}
                    @endauth
                </a>

                <ul class="dropdown-menu dropdown-menu-end">

                    <li>
                        <a class="dropdown-item"
                            href="{{ route('user.show', auth()->id()) }}">

                            <i class="bi bi-person me-2"></i>
                            Profile

                        </a>
                    </li>

                    <li>
                        <a class="dropdown-item text-danger" href="{{route('logout')}}">
                            <i class="bi bi-person me-2"></i>
                            Logout
                        </a>
                    </li>

                </ul>

            </div>

        </div>

    </div>

</nav>
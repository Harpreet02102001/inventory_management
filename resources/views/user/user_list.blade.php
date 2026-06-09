<x-layout title="User List">

    <div class="container-fluid">

        <div class="card border-0 shadow-sm rounded-4">

            <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">

                <h4 class="mb-0 fw-bold">
                    User Management
                </h4>

                <a href="{{ route('user.create') }}"
                    class="btn btn-primary">
                    Add User
                </a>

            </div>

            <div class="card-body">

                <div class="table-responsive">

                    <table class="table table-hover align-middle">

                        <thead>

                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Created</th>
                                <th width="180">Actions</th>
                            </tr>

                        </thead>

                        <tbody>

                            @forelse($users as $user)

                            <tr>

                                <td>
                                    {{ $loop->iteration }}
                                </td>

                                <td>
                                    {{ $user->name }}
                                </td>

                                <td>
                                    {{ $user->email }}
                                </td>

                                <td>
                                    <span class="badge bg-primary">
                                        {{ $user->role?->name }}
                                    </span>
                                </td>

                                <td>

                                    @if($user->is_active === 1)

                                    <span class="badge bg-success">
                                        Active
                                    </span>

                                    @else

                                    <span class="badge bg-danger">
                                        Inactive
                                    </span>

                                    @endif

                                </td>

                                <td>
                                    {{ $user->created_at->format('d M Y') }}
                                </td>

                                <td>

                                    <div class="d-flex gap-2">

                                        <a href="{{ route('user.show', $user->id) }}"
                                            class="btn btn-sm btn-outline-info">
                                            View
                                        </a>

                                        <a href="{{ route('user.edit', $user->id )}}"
                                            class="btn btn-sm btn-outline-warning">
                                            Edit
                                        </a>

                                        <form action="#"
                                            method="POST">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                class="btn btn-sm btn-outline-danger">
                                                Delete
                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                            @empty

                            <tr>

                                <td colspan="7"
                                    class="text-center py-4">

                                    No users found.

                                </td>

                            </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

</x-layout>
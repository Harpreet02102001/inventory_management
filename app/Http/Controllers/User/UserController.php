<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdatePasswordRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use App\Repositories\UserRepository;

class UserController extends Controller
{

    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }



    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::get();
        return view('user.user_list', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // dd('controller hit');
        $roles = Role::get();
        return view('user.createUser', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        // dd($request->all());
        $validated = $request->validated();

        try {

            DB::beginTransaction();

            // User::create([
            //     'name'      => $validated['name'],
            //     'email'     => $validated['email'],
            //     'role_id'   => $validated['role_id'],
            //     'is_active' => $validated['is_active'],
            //     'password'  => Hash::make($validated['password']),
            // ]);

            //above code help to store the user through the repository after validated from UserRequest
            $this->userRepository->store($request->validated());

            DB::commit();

            Alert::toast('User created successfully.', 'success');

            return redirect()
                ->route('dashboard')
                ->with('success', 'User created successfully.');
        } catch (\Throwable $th) {

            DB::rollBack();

            Alert::toast('An error occurred while creating the user.', 'error');

            return back()
                ->withInput()
                ->with('error', $th->getMessage());
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $role = Role::get();
        $user = User::findOrFail($id);
        return view('user.userProfile', compact('user', 'role'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $roles = Role::get();
        $user = User::findOrFail($id);
        return view('user.userUpdate', compact('user', 'roles'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, string $id)
    {
        try {

            DB::beginTransaction();

            $this->userRepository->update($id, $request->validated());

            DB::commit();

            Alert::toast('User updated successfully.', 'success');

            return redirect()->route('user.index');
        } catch (\Throwable $th) {

            DB::rollBack();

            Alert::toast('An error occurred while updating the user.', 'error');

            return back()
                ->withInput()
                ->with('error', $th->getMessage());
        }
    }

    public function updateProfile(UpdateProfileRequest $request)
    {
        try {

            $validated = $request->validated();

            auth()->user()->update($validated);

            Alert::toast('Profile updated successfully.', 'success');

            return back();
        } catch (\Throwable $th) {

            Log::error('Profile Update Error', [
                'user_id' => auth()->id(),
                'message' => $th->getMessage(),
            ]);

            Alert::toast('An error occurred while updating the profile.', 'error');

            return back()->withInput();
        }
    }

    public function updatePassword(UpdatePasswordRequest $request)
    {
        $validated = $request->validated();

        $user = auth()->user();

        if (! Hash::check($validated['current_password'], $user->password)) {

            return back()->withErrors([
                'current_password' => 'Current password is incorrect.'
            ]);
        }

        $user->update([
            'password' => $validated['password'],
        ]);
        Alert::toast('Password updated successfully.', 'success');
        return back()->with('success', 'Password updated successfully.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return back();
    }
}

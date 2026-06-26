<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
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

            User::create([
                'name'      => $validated['name'],
                'email'     => $validated['email'],
                'role_id'   => $validated['role_id'],
                'is_active' => $validated['is_active'],
                'password'  => Hash::make($validated['password']),
            ]);

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
        $validated = $request->validated();

        try {

            DB::beginTransaction();

            $user = User::findOrFail($id);

            $data = [
                'name'      => $validated['name'],
                'email'     => $validated['email'],
                'role_id'   => $validated['role_id'],
                'is_active' => $validated['is_active'],
            ];

            if (!empty($validated['password'])) {
                $data['password'] = Hash::make($validated['password']);
            }

            $user->update($data);

            DB::commit();

            Alert::toast('User updated successfully.', 'success');

            return redirect()->route('user')->with('success', 'User updated successfully.');
        } catch (\Throwable $th) {

            // dd($th->getMessage());

            DB::rollBack();

            Alert::toast('An error occurred while updating the user.', 'error');

            return back()
                ->withInput()
                ->with('error', $th->getMessage());
        }
    }

    public function updateProfile(Request $request)
    {
        // dd($request->all());
        try {

            $validated = $request->validate([
                'name'  => 'required|max:255',
                'email' => 'required|email|unique:users,email,' . auth()->id(),
            ]);

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

    public function updatePassword(Request $request)
    {
        $validated = $request->validate([
            'current_password' => 'required',
            'password' => 'required|min:8|confirmed',
        ]);

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

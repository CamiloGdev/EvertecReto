<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Role;
use App\Http\Requests\UserEditRequest;
use App\Http\Requests\UserCreateRequest;

class UserController extends Controller
{
    //
    public function index()
    {
        abort_if(Gate::denies('user_index'), 403);
        $users = User::paginate(5);
        return view('users.index', compact('users'));
    }

    public function create()
    {
        abort_if(Gate::denies('user_create'), 403);
        $roles = Role::all()->pluck('name', 'id');
        return view('users.create', compact('roles'));
    }

    public function store(UserCreateRequest $request)
    {
        // $request->validate([
        //     'name' => 'required|max:255|string',
        //     'username' => 'required|string|max:255',
        //     'email' => 'required|string|email|max:255|unique:users',
        //     'password' => 'required',
        // ]);

        $user = User::create($request->only('name', 'username', 'email')
            + ['password' => bcrypt($request->input('password')),]);

        $roles = $request->input('roles', []);
        $user->syncRoles($roles);

        return redirect()->route('users.show', $user->id)->with('success', 'User created successfully');
    }

    public function show(User $user)
    {
        abort_if(Gate::denies('user_show'), 403);
        // $user=User::findOrFail($id);
        // dd($user);
        $user->load('roles');
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        abort_if(Gate::denies('user_edit'), 403);
        $roles = Role::all()->pluck('name', 'id');
        $user->load('roles');
        return view('users.edit', compact('user', 'roles'));
    }

    public function update(UserEditRequest $request, User $user)
    {
//        $data = $request->only('name', 'username', 'email');
        $data = $request->only('name', 'username');
        $password = $request->input('password');

        if($password)
            $data['password'] = bcrypt($password);

        $user->update($data);

        $roles = $request->input('roles', []);
        $user->syncRoles($roles);

        return redirect()->route('users.show', $user->id)->with('success', 'Successful data update');
    }

    public function destroy(User $user)
    {
        abort_if(Gate::denies('user_destroy'), 403);

        if (auth()->user()->id == $user->id) {
            return redirect()->route('users.index');
        }

        $user->delete();

        return back()->with('success', 'Successfully deleted user');
    }
}

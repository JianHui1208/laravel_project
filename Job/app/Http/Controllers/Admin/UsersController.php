<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Role;
use App\Models\User;
use Gate;
use DB;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UsersController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $admins = DB::table('role_user')
        ->join('users','users.id', '=', 'role_user.user_id')
        ->select('role_user.role_id as Roles_id', 'users.*')
        ->where('role_user.role_id', '=', '1')
        ->get();

        $students = DB::table('role_user')
        ->join('users','users.id', '=', 'role_user.user_id')
        ->select('role_user.role_id as Roles_id', 'users.*')
        ->where('role_user.role_id', '=', '2')
        ->get();

        $companies = DB::table('role_user')
        ->join('users','users.id', '=', 'role_user.user_id')
        ->select('role_user.role_id as Roles_id', 'users.*')
        ->where('role_user.role_id', '=', '3')
        ->get();

        $lecturers = DB::table('role_user')
        ->join('users','users.id', '=', 'role_user.user_id')
        ->select('role_user.role_id as Roles_id', 'users.*')
        ->where('role_user.role_id', '=', '4')
        ->get();

        // $users = User::with(['roles'])->get();
        return view('admin.users.index', compact('admins', 'students', 'companies', 'lecturers'));
    }

    public function create()
    {
        abort_if(Gate::denies('user_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Role::all()->pluck('title', 'id');

        return view('admin.users.create', compact('roles'));
    }

    public function store(StoreUserRequest $request)
    {
        $user = User::create($request->all());
        $user->roles()->sync($request->input('roles', []));

        return redirect()->route('admin.users.index');
    }

    public function edit(User $user)
    {
        abort_if(Gate::denies('user_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Role::all()->pluck('title', 'id');

        $user->load('roles');

        return view('admin.users.edit', compact('roles', 'user'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->all());
        $user->roles()->sync($request->input('roles', []));

        return redirect()->route('admin.users.index');
    }

    public function show(User $user)
    {
        abort_if(Gate::denies('user_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user->load('roles');

        return view('admin.users.show', compact('user'));
    }

    public function destroy(User $user)
    {
        abort_if(Gate::denies('user_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user->delete();

        return back();
    }

    public function massDestroy(MassDestroyUserRequest $request)
    {
        User::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

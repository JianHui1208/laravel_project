<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;
use DB;
use Gate;
use Validator;
use Symfony\Component\HttpFoundation\Response;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function admin()
    {
        $admins = DB::table('role_user')
        ->join('users','users.id', '=', 'role_user.user_id')
        ->select('role_user.role_id as Roles_id', 'users.*')
        ->where('role_user.role_id', '=', '1')
        ->get()
        ->toArray();
        return (array)$admins;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function student()
    {
        $students = DB::table('role_user')
        ->join('users','users.id', '=', 'role_user.user_id')
        ->select('role_user.role_id as Roles_id', 'users.*')
        ->where('role_user.role_id', '=', '2')
        ->get()
        ->toArray();
        return (array)$students;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function company()
    {
        $companies = DB::table('role_user')
        ->join('users','users.id', '=', 'role_user.user_id')
        ->select('role_user.role_id as Roles_id', 'users.*')
        ->where('role_user.role_id', '=', '3')
        ->get()
        ->toArray();
        return (array)$companies;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function lecturer()
    {
        $lecturers = DB::table('role_user')
        ->join('users','users.id', '=', 'role_user.user_id')
        ->select('role_user.role_id as Roles_id', 'users.*')
        ->where('role_user.role_id', '=', '4')
        ->get()
        ->toArray();
        return (array)$lecturers;
    }
}

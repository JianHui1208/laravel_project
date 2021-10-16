<?php

namespace App\Http\Controllers\Company;

use App\Http\Requests\storeJobRequest;
use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\User;
use DB;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $keyword1=$request->title;
        $keyword2=$request->place;
        $keyword3=$request->type;
        // dd($keyword1, $keyword2, $keyword3);
        if ($keyword1 == null || $keyword2 == null && $keyword3 != null) {
            $jobs=DB::table('jobs')
            ->leftjoin('users', 'users.id', '=', 'jobs.user_id')
            ->select('users.FristName as companyname', 'jobs.*')
            ->where('jobs.type', 'LIKE', '%'. $keyword3. '%')
            ->get();
            // dd($jobs,'1');
        }elseif($keyword1 != null && $keyword2 == null && $keyword3 == null){
            $jobs=DB::table('jobs')
            ->leftjoin('users', 'users.id', '=', 'jobs.user_id')
            ->select('users.FristName as companyname', 'jobs.*')
            ->where('jobs.title', 'LIKE', '%'. $keyword1 . '%')
            ->get();
            // dd($jobs, '2');
        }elseif($keyword1 != null || $keyword2 != null && $keyword3 != null){
            $jobs=DB::table('jobs')
            ->leftjoin('users', 'users.id', '=', 'jobs.user_id')
            ->select('users.FristName as companyname', 'jobs.*')
            ->where('jobs.title', 'LIKE', '%'. $keyword1 . '%')
            ->orWhere('jobs.place', 'LIKE', '%'. $keyword2 . '%')
            ->get();
            // dd($jobs,'3');
        }
        return view('company.index')->with('jobs', $jobs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storeJobRequest $request)
    {
        $job = Job::create($request->all())->companyID;
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

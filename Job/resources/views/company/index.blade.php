@extends('layouts.home')
@section('home')

<div id="showCompany" class="card" style="height: 507px;">
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Title</th>
                <th>Company Name</th>
                <th>Place</th>
                <th>Type</th>
                <th>Salary</th>
            </tr>
        </thead>
        <tbody>
        @foreach($jobs as $job)
            <tr>
                <td>{{ $loop->index+1 }}</td>
                <td>{{ $job->title }}</td>
                <td>{{ $job->companyname }}</td>
                <td>{{ $job->place }}</td>
                <td>{{ $job->type }}</td>
                <td>{{ $job->salary }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

@endsection


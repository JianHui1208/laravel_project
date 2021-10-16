@extends('layouts.home')
@section('home')

<div class="container-fluid search-bar">
    <form action="{{ route('home.search') }}" method="post">
        @csrf
        <div class="row search-input">
            <div class="col-sm-6 input-form right-10">
                <input type="text" name="title" id="" class="jobs-name" placeholder="Job title, keyword or company">
                <input type="text" name="place" id="" class="jobs-place" placeholder="Area, city or town">       
            </div>
            <div class="col-sm-6 input-form left-10">
                <select name="type" id="" class="jobs-types">
                    <option value="">Job Type</option>
                    <option value="Full Time">Full Time</option>
                    <option value="Part Time">Part Time</option>
                    <option value="Temporary">Temporary</option>
                    <option value="Contract">Contract</option>
                    <option value="Internship">Internship</option>
                </select>
                <button type="submit" class="submit-button">Search</button>
            </div>
        </div>
    </form>
</div>

<div class="container-fluid recomm-div">
        <div class="row">
            <div class="col-sm-3 head-recomm">
                <p><b>Recommended Jobs</b></p>
            </div>
            <div class="col-sm-3">
                <table>
                    <tr>
                        <td><span class="count">qwerqwer</span></td>
                        <td class="recomm"><a href=""><span>Progammers</span></a></td>
                    </tr>
                    <tr>
                        <td colspan="2"><p>Johorwefwrf</p></td>
                    </tr>
                </table>
            </div>
            <div class="col-sm-3">
                <table>
                    <tr>
                        <td><span class="count">qwerqwer</span></td>
                        <td class="recomm"><a href=""><span>Progammers</span></a></td>
                    </tr>
                    <tr>
                        <td colspan="2"><p>Johorwefwrf</p></td>
                    </tr>
                </table>
            </div>
            <div class="col-sm-3">
                <table>
                    <tr>
                        <td><span class="count">qwerqwer</span></td>
                        <td class="recomm"><a href=""><span>Progammers</span></a></td>
                    </tr>
                    <tr>
                        <td colspan="2"><p>Johorwefwrf</p></td>
                    </tr>
                </table>
            </div>
        </div>
</div>

    <div class="container-fluid img-div">
            <div class="row">
                <div class="col-sm-6 img-position">
                    <img src="{{ asset('Icon/company.png') }}" alt="" width="20%">
                </div>
                <div class="col-sm-6 word-pagraph">
                    <p>akjsdfnklasjdfnakjsdfnklasjdfnakjsdfnklasjdfnak</p>
                    <p>jsdfnklasjdfnakjsdfnklasjdfnakjsdfnklasjdfnakjsdfnklasjdfn</p>
                    <p>jsdfnklasjdfnakjsdfnklasjdfnakjsdfnklasjdfnakjsdfnklasjdfn</p>
                </div>
            </div>
    </div>
    
@endsection
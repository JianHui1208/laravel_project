<div class="container-fluid">
    <div class="row row1">
        <div class="col col1">
            <a href="http://localhost:8000/"><b>Find Job!!!</b></a>
        </div>
        <div class="col col2">
            <marquee width="80%" direction="left" height="150px" scrollamount="5">
                ✨Find the jobs that matter to you✨
            </marquee>
        </div>
        <div class="col col3">
        @if (Route::has('login'))
            @auth
                <a href="{{ url('/home') }}">{{Auth::user()->FristName}}</a>
            @else
                <a href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('users.register.company') }}">Company Register</a>
                    <a href="{{ route('users.register.students') }}">Student Register</a>
                @endif
            @endif
        @endif
        </div>
    </div>
</div>
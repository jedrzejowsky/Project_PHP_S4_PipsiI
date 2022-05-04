<?php use App\Http\Controllers\Auth\LoginController;?>
<nav class="navbar navbar-expand-lg navbar-dark bg-black">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{url('/images/logo.png')}}" width="100" height="50" class="img-fluid" alt="Logo"/>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a aria-current="page" href="{{ route('home') }}" {!! request()->routeIs('home') ? ' class="nav-link active" ' : ' class="nav-link" ' !!}>Home</a>
                </li>
                <li class="nav-item">
                        <a aria-current="page" href="#" {!! request()->routeIs('link') ? ' class="nav-link active" ' : ' class="nav-link" ' !!} >Link</a>
                </li>
                <li class="nav-item">
                    <a aria-current="page" href="{{ route('authors') }}" {!! request()->routeIs('authors') ? ' class="nav-link active" ' : ' class="nav-link" ' !!}>Authors</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page">
                    <strong>Database Connected: </strong>
                    <?php
                    try {
                        \DB::connection()->getPDO();
                        echo \DB::connection()->getDatabaseName();
                    } catch (\Exception $e) {
                        echo 'None';
                    }
                    ?>
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto me-5 mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    @auth
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" >
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#logout">Logout</a></li>
                        </ul>
                    @else
                        <a aria-current="page" href="{{ route('login') }}" {!! request()->routeIs('login') ? ' class="nav-link active" ' : ' class="nav-link" ' !!}>Log In</a>
                    @endauth
                </li>
            </ul>
        </div>
    </div>
</nav>
@auth
<form id="logout-form" method="POST" action="{{route('logout')}}">
@csrf
</form>
<script>
    document.querySelector("a[href='#logout']").addEventListener("click",function (e)
    {
        e.preventDefault();
        document.querySelector("#logout-form").submit();
    }, false);
</script>
@endauth

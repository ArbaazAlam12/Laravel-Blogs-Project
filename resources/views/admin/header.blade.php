 <!-- header section -->
 <header class="header_section">
    <div class="container">
        <div style="height: 80px">
            <nav class="navbar navbar-expand-lg custom_nav-container ">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class=""> </span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav" style="height: 70px">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="{{ url('view_category') }}">Add Category</a>
                        </li>


                        @if (Route::has('login'))
                        @auth
                        <li class="nav-item">
                            <x-app-layout>
                            </x-app-layout>
                        </li>
                        @else

                        <li class="nav-item">
                            <a class="btn btn-primary" id="logincss" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-primary" href="{{ route('register') }}">Register</a>
                        </li>
                        @endauth
                        @endif

                    </ul>
                </div>
            </nav>
        </div>
    </div>
 </header>


 <!-- header section strats -->
 <header class="header_section">
    <div >
        <div >
            <nav class="navbar navbar-expand-lg custom_nav-container ">
                <a class="navbar-brand" href="{{ url('/') }}"><img height="100px" width="120px " src="home\images\a.png" alt="#" /></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class=""> </span>
                </button>
                <div style="margin-right: 50px" class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav" >
                        <li class="nav-item active">
                        <a class="nav-link" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="{{ url('my_blog') }}">My blog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('add_post') }}">Add blog</a>
                        </li>

                        @if (Route::has('login'))
                        @auth
                        <li class="nav-item">
                            <x-app-layout>
                            </x-app-layout>
                        </li>
                        @else

                        <li class="nav-item">
                            <a class="btn btn-dark" id="logincss" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-dark" href="{{ route('register') }}">Register</a>
                        </li>
                        @endauth
                        @endif

                    </ul>
                </div>
            </nav>
        </div>


 </header>
 <!-- end header section -->

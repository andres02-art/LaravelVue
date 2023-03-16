<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <title>libreria</title>
        <meta name="csrf_connect" content="{{ csrf_token() }}">
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    </head>
    <body>
        <section id="menuBar">
            <nav id="menuBar" class="navbar navbar-expand navbar-light bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="{{ url('/#Libreria') }}">Libreria</a>
                    <button class="navbar-toggler"><span class="navbar-toggler-icon"></span></button>
                    <div id="navbarSupportedContent" class="collapse navbar-collapse justify-content-center">
                        <ul id="Libreria" class="navbar-nav d-flex mb-3 container-fluid align-items-center">
                            <li id="navItem01" class="nav-item p-2"><a id="navContent01" class="nav-link bg-purple bg-gradient" href="{{route('signUp')}}">Log User</a></li>
                            <li id="navItem02" class="nav-item p-2"><a id="navContent02" class="nav-link bg-purple bg-gradient" href="">Search</a></li>
                            <li id="navItem01" class="nav-item p-2 ms-auto">
                                <input id="navContent01" class="nav-link" type="search">
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </section>

        @yield('menuBar')



        <section id="ViteVue" class="container-fluid">
            <div id="VueApp">
                <index-app />
            </div>
        </section>
        @yield('VueApp')
    </body>
</html>
